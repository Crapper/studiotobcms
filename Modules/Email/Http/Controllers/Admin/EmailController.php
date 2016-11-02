<?php namespace Modules\Email\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Email\Entities\Email;
use Modules\Email\Repositories\EmailRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class EmailController extends AdminBaseController
{
    /**
     * @var EmailRepository
     */
    private $email;

    public function __construct(EmailRepository $email)
    {
        parent::__construct();

        $this->email = $email;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$emails = $this->email->all();

        return view('email::admin.emails.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('email::admin.emails.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->email->create($request->all());

        flash()->success(trans('core::core.messages.resource created', ['name' => trans('email::emails.title.emails')]));

        return redirect()->route('admin.email.email.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Email $email
     * @return Response
     */
    public function edit(Email $email)
    {
        return view('email::admin.emails.edit', compact('email'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Email $email
     * @param  Request $request
     * @return Response
     */
    public function update(Email $email, Request $request)
    {
        $this->email->update($email, $request->all());

        flash()->success(trans('core::core.messages.resource updated', ['name' => trans('email::emails.title.emails')]));

        return redirect()->route('admin.email.email.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Email $email
     * @return Response
     */
    public function destroy(Email $email)
    {
        $this->email->destroy($email);

        flash()->success(trans('core::core.messages.resource deleted', ['name' => trans('email::emails.title.emails')]));

        return redirect()->route('admin.email.email.index');
    }
}
