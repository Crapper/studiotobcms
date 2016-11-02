<?php namespace Modules\Email\Http\Controllers;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Email\Entities\Email;
use Modules\Core\Http\Controllers\BasePublicController;
use Modules\Core\Contracts\Setting;
use Illuminate\Support\Facades\Mail;
use Modules\Page\Entities\Page;
use Modules\ContentBlockImage\Entities\ContentBlockImage;
use Modules\ContentBlockText\Entities\ContentBlockText;
use Modules\Section\Entities\Section;



class FrontendController extends BasePublicController
{
    /**
     * @var EmailRepository
     */
    /**
     * @var Setting
     */
    private $setting;
    private $email;

    public function __construct(Email $email ,Setting $setting)
    {
        parent::__construct();

        $this->email = $email;
        $this->setting = $setting;

    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Page $pagina, ContentBlockText $contentBlockText, ContentBlockImage $contentBlockImage, Section $section  )
    {

        $get_page_id_footer = $pagina->where('template','contentblokken.footer')->get();
        $footer_page_id = $get_page_id_footer[0]->id;

        $footer =  $section->where('page_id',$footer_page_id)->get();


        $footer_contentBlok = $contentBlockText->where('page_id',$footer_page_id)->get();
        $footer_contentImage = $contentBlockImage->where('page_id',$footer_page_id)->get();

        return view('email.form', compact('footer','footer_contentBlok','footer_contentImage'));
    }

    public function sendmail(Request $request)
    {
        $this->ontvanger = $this->setting->get('email::email');
        $this->onderwerp = $this->setting->get('email::onderwerp');

        $this->name = $request->get('name');
        $this->lastname = $request->get('lastname');
        $this->email = $request->get('email');
        $this->phone = $request->get('phone');
        $this->messages = $request->get('messages');

        $data = array('name' => $this->name,
                        'lastname' => $this->lastname,
                        'email' => $this->email,
                        'phone' => $this->phone,
                        'messages' => $this->messages
            );

        Mail::send('email.bericht', $data, function($message)
        {
            $message->to($this->ontvanger)
                ->subject($this->onderwerp);
        });
        \Session::flash('flash_message','We hebben uw bericht ontvangen en zullen deze zo spoedig mogelijk in behandeling nemen.');

        return \Redirect::route('mailform')->with('message', 'Thanks for contacting us!');

    }


}
