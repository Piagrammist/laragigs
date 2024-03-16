<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ListingController extends Controller
{
    public function index(Request $req): View
    {
        return view('listings.index', [
            'listings' => Listing::latest()
                ->filter($req->only('tag', 'search'))
                ->paginate(6),
        ]);
    }

    public function show(Listing $listing): View
    {
        return view('listings.show', compact('listing'));
    }

    public function store(Request $req): RedirectResponse
    {
        $formFields = $this->processForm($req);
        $formFields['user_id'] = $req->user()->id;
        $listing = Listing::create($formFields);

        // Session::flash('success', 'Listing created successfully!');
        return to_route('listings.show', $listing->id)
            ->with('success', 'Listing created successfully!');
    }

    public function edit(Listing $listing): View
    {
        return view('listings.edit', compact('listing'));
    }

    public function update(Request $req, Listing $listing): RedirectResponse
    {
        if ($req->user()->id !== $listing->user_id) {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $this->processForm($req);
        if (!empty($formFields['logo'])) {
            // Delete the previous logo
            Storage::disk('public')->delete($listing->logo);
        }
        $listing->update($formFields);

        return to_route('listings.show', $listing->id)
            ->with('success', 'Listing updated successfully!');
    }

    public function destroy(Request $req, Listing $listing): RedirectResponse
    {
        if ($req->user()->id !== $listing->user_id) {
            abort(403, 'Unauthorized Action');
        }

        $listing->delete();

        return to_route('listings.index')
            ->with('success', 'Listing deleted successfully!');
    }

    public function manage(Request $req): View
    {
        return view('listings.manage', ['listings' => $req->user()->listings]);
    }

    protected function processForm(Request $req): array
    {
        $formFields = $req->validate([
            'title'       => 'required|max:255',
            'tags'        => 'required|max:255',
            'company'     => 'required|max:255',
            'location'    => 'required|max:255',
            'email'       => 'required|max:254|email',
            'website'     => 'required|max:255|url',
            'description' => 'required',
        ]);
        $formFields['tags'] = str_replace(' ', '', $formFields['tags']);
        if ($req->hasFile('logo')) {
            $formFields['logo'] = $req->file('logo')->store('logos', 'public');
        }
        return $formFields;
    }
}
