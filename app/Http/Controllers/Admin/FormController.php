<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormsFormRequest;
use App\Models\Form;
use Exception;

class FormController extends Controller
{
    /**
     * Display a listing of the forms.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $forms = Form::paginate(25);

        return view('admin.forms.index', compact('forms'));
    }

    /**
     * Show the form for creating a new form.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        return view('admin.forms.create');
    }

    /**
     * Store a new form in the storage.
     *
     * @param App\Http\Requests\FormsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(FormsFormRequest $request)
    {
        try {
            Form::create($request->validated());

            return redirect()->route('form.index')
                ->with('success_message', 'Form was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Show the form for editing the specified form.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $form = Form::findOrFail($id);

        return view('admin.forms.edit', compact('form'));
    }

    /**
     * Update the specified form in the storage.
     *
     * @param int $id
     * @param App\Http\Requests\FormsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, FormsFormRequest $request)
    {
        try {
            $form = Form::findOrFail($id);
            $form->update($request->validated());

            return redirect()->route('form.index')
                ->with('success_message', 'Form was successfully updated.');
        } catch (Exception $exception) {
            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified form from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $form = Form::findOrFail($id);
            $form->delete();

            return redirect()->route('form.index')
                ->with('success_message', 'Form was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

}
