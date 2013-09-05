<?php

class CompaniesController extends BaseController {

	public function getView($slug)
	{
		
		$companies = Company::with('comcontacts')->where('slug', $slug)->first();
		$landlines = $companies->comcontacts()->where('phone_type','=','landline')->get();
        $mobiles = $companies->comcontacts()->where('phone_type','=','mobile')->get();
		if (is_null($companies))
		{
			// If we ended up in here, it means that a page or a blog post
			// don't exist. So, this means that it is time for 404 error page.
			return Redirect::route('home')->with('error', 'Page Not Found');
		}


		return View::make('business.listing', compact('companies','landlines','mobiles'));

	}
}
