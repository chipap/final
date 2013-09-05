<?php 

class ProjectController extends BaseController {

	public function getCreate()
	{
		// Show the page
		return View::make('frontend/project/create-project');
	}

	/**
	 * Project create form processing.
	 *
	 * @return Redirect
	 */
	public function createProject()
	{
		// Declare the rules for the form validation
		$rules = array(
			'project_name'   => 'required|min:3',
			'project_description' => 'required',
			'contact_number' => 'required',
			'terms' => 'required'
		);

		// Create a new validator instance from our validation rules
		$validator = Validator::make(Input::all(), $rules);

		// If validation fails, we'll exit the operation now.
		if ($validator->fails())
		{
			// Ooops.. something went wrong
			return Redirect::back()->withInput()->withErrors($validator);
		}

		//Create a new blog post
		$project = new Project;

		// Update the blog post data

		$project->name			= e(Input::get('project_name'));
		$project->slug 			= e(Str::slug(Input::get('project_name')));
		$project->description	= e(Input::get('project_description'));
		$project->street		= e(Input::get('street_name'));
		$project->phone			= e(Input::get('contact_number'));
		$project->possesion		= e(Input::get('possesion'));	
		$project->type 			= e(Input::get('project_type'));
		$project->floors		= e(Input::get('floors'));

		// Was the Project created?
		if($project->save())
		{
			// Redirect to the new Project page
			return Redirect::to("/")->with('success', Lang::get('admin/blogs/message.create.success'));
		}

		// Redirect to the Project create page
		return Redirect::to('create')->with('error', Lang::get('admin/blogs/message.create.error'));
	}

}