<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CMS\Init\InitBase;
use App\Models\CMS\Module;
use App\Models\CMS\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FormController extends Controller
{
    protected $page;
    protected $categoryHandle;
    protected $defaultForm;
    protected $extraForm;
    public function __construct(Page $page)
    {
        $this->page = $page;
        $this->defaultForm = [
            'email' => 'email',
            'title' => 'title',
            'content' => 'content',
        ];
        $this->extraForm = getExtraFormFrontend($page);
        $this->categoryHandle = getCategoryHandle($page);
        // dd($this->categoryHandle);
    }
    public function index()
    {
        $page = $this->page;
        $defaultForm = $this->defaultForm;
        $extraForm = $this->extraForm;

        $modules = Module::whereIn('id', $page->modules)->get();
        return view('frontend.templates.form', compact('page', 'modules', 'defaultForm', 'extraForm'));
    }

    public function store(Request $request)
    {
        // Thu thập dữ liệu từ form
        $data = [];
        foreach ($this->defaultForm as $key => $item) {
            $data[$key] = $request->get($key);
        }
        foreach ($this->extraForm as $key => $item) {
            $item['value'] = $request->get($item['name']);
            $data['data'][$key] = $item;
        }

        $item_class = $this->categoryHandle->item_class;
        $data = "App\Models$item_class"::create($data);
        if ($data) {
            $item_class_mail = "App\Mail\CMS\\" . InitBase::mail($this->categoryHandle->title);
            try {
                // Tạo một đối tượng của lớp Contact
                $mailInstance = new $item_class_mail($request->all());
                
                // Gửi email ngay lập tức
                Mail::to($request->get('email'))->send($mailInstance);
            
                // Redirect về trang trước đó với session success nếu gửi email thành công
                return redirect()->back()->with('success', 'Email đã được gửi thành công.');
            
            } catch (\Exception $e) {
                // Xử lý lỗi nếu gửi email không thành công
                return redirect()->back()->with('error', 'Có lỗi xảy ra khi gửi email. Vui lòng thử lại.');
            }
        }
    }
}
