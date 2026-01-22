<?php

namespace App\Http\Controllers;

use DB;

use App\Models\Term;

use App\Models\Privacy;

use App\Models\Brand;

use App\Models\Service;

use App\Models\Copyright;

use App\Models\ProExcel;

use App\Models\FAQ;

use App\Models\How;

use App\Models\About;

use App\Models\Slider;

use App\Models\User;

use App\Models\Banner;

use App\Models\Message;

use App\Models\Category;

use App\Models\Testimonial;

use App\Models\Variation;

use App\Models\Signal;

use App\Models\Blog;

use App\Models\Course;

use App\Models\Topic;

use App\Models\SendMails;

use App\Models\Product;

use Illuminate\Http\Request;

use BinaryCats\Sku\HasSku;

use Datetime;

use Hash;

use Session;

use Redirect;

use Illuminate\Support\Facades\Crypt;

use Illuminate\Support\Str;

class AdminsController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {

        $Notifications = DB::table('notifications')->limit('5')->get();
        $ActivityLog = DB::table('activity_log')->orderBy('id','DESC')->limit('5')->get();
        $SiteSettings = DB::table('_site_settings')->get();
        $Message = DB::table('messages')->limit('5')->get();
        return view('admin.index',compact('Notifications','ActivityLog','SiteSettings','Message'));
    }

    public function activitylogs()
    {
        activity()->log('User Accessed the Admins Dashboard');
        $Notifications = DB::table('notifications')->limit('5')->get();
        $ActivityLog = DB::table('activity_log')->orderBy('id','DESC')->paginate(100);
        $SiteSettings = DB::table('_site_settings')->get();
        $Message = DB::table('messages')->limit('5')->get();
        return view('admin.index',compact('Notifications','ActivityLog','SiteSettings','Message'));
    }



    public function SiteSettings(){
        activity()->log('User Accessed Site Settings Page');
        $SiteSettings = DB::table('_site_settings')->get();
        return view('admin.site_settings',compact('SiteSettings'));
    }

    public function mailerSettings(){
        activity()->log('User Accessed Mailer Settings Page');
        $SiteSettings = DB::table('email_settings')->get();
        return view('admin.mailerSettings',compact('SiteSettings'));
    }


    public function SocialMediaSettings(){
        activity()->log('User Accessed Social Media Settings Page');
        $SiteSettings = DB::table('_site_settings')->get();
        return view('admin.SocialMediaSettings',compact('SiteSettings'));
    }

    public function systemsCredentials(){
        activity()->log('User Accessed The Systems Credentials Page');
        $SiteSettings = DB::table('_site_settings')->get();
        return view('admin.systemsCredentials',compact('SiteSettings'));
    }

    public function logo_and_favicon(){
        activity()->log('User Accessed Logo & Favicon Settings Page');
        $SiteSettings = DB::table('_site_settings')->get();
        return view('admin.logo_and_favicon',compact('SiteSettings'));
    }


    public function logo_and_favicon_update(Request $request){
        activity()->log('User Made an update on the logo and the favicons page');
        $path = 'uploads/logo';
        if(isset($request->logo)){
            $file = $request->file('logo');
            $filename = $file->getClientOriginalName();
            $file->move($path, $filename);
            $logo = $filename;
        }else{
            $logo = $request->logo_cheat;
        }

        if(isset($request->favicon)){
            $file = $request->file('favicon');
            $filename = $file->getClientOriginalName();
            $file->move($path, $filename);
            $favicon = $filename;
        }else{
            $favicon = $request->favicon_cheat;
        }

        if(isset($request->logo_two)){
            $file = $request->file('logo_two');
            $filename = $file->getClientOriginalName();
            $file->move($path, $filename);
            $logo_two = $filename;
        }else{
            $logo_two = $request->logo_two_cheat;
        }

        if(isset($request->logo_footer)){
            $file = $request->file('logo_footer');
            $filename = $file->getClientOriginalName();
            $file->move($path, $filename);
            $logo_footer = $filename;
        }else{
            $logo_footer = $request->logo_footer_cheat;
        }


        $updateDetails = array (
            'logo'=>$logo,
            'logo_footer' =>$logo_footer,
            'logo_two'=>$logo_two,
            'favicon'=>$favicon,
        );

        DB::table('_site_settings')->update($updateDetails);
        Session::flash('message', "Changes have Been Saved");
        return Redirect::back();
    }

    public function editRisk(){
        activity()->log('User Accessed The Risk Declaration Page');
        // activity()->log('User Accessed Site Settings Page');
        $Settings = DB::table('_site_settings')->get();
        $page_title = 'formfiletext';
        $page_name = 'Copyright';
        return view('admin.editRisk',compact('page_title','page_name','Settings'));
    }

    public function edit_Risk(Request $request){
        activity()->log('Update Risk Declaration page');
        $updateDetails = array(
            'risks'=>$request->content
        );
        DB::table('_site_settings')->update($updateDetails);

        Session::flash('message', "Changes have Been Saved");
        return Redirect::back();
    }

    public function about(){
        activity()->log('User Accessed The About Section');
        // activity()->log('User Accessed Site Settings Page');
        $About = About::all();
        $page_title = 'formfiletext';
        $page_name = 'About';
        return view('admin.editAbout',compact('page_title','page_name','About'));
    }

    public function edit_about(Request $request){
        activity()->log('Update o the copyright page');
        $updateDetails = array(
            'content'=>$request->content
        );
        DB::table('abouts')->update($updateDetails);

        Session::flash('message', "Changes have Been Saved");
        return Redirect::back();
    }

    public function copyright(){
        activity()->log('User Accessed The Copyright Section');
        // activity()->log('User Accessed Site Settings Page');
        $Copyright = Copyright::all();
        $page_title = 'formfiletext';
        $page_name = 'Copyright';
        return view('admin.editCopyright',compact('page_title','page_name','Copyright'));
    }

    public function edit_copyright(Request $request){
        activity()->log('Update o the copyright page');
        $updateDetails = array(
            'content'=>$request->content
        );
        DB::table('copyright')->update($updateDetails);

        Session::flash('message', "Changes have Been Saved");
        return Redirect::back();
    }

    public function addTerms(){
        activity()->log('Access The Add  Terms and Conditions Page');
        $page_name = 'Add Terms & Conditions';
        $page_title = 'formfiletext';
        return view('admin.addTerms',compact('page_title','page_name'));
    }

    public function add_term(Request $request){
        activity()->log('Terms & Condition Added');
        $terms = new Term;
        $terms->title = $request->title;
        $terms->content = $request->content;
        $terms->save();
        Session::flash('message', "Content Has been Added");
        return Redirect::back();
    }

    public function terms(){
        activity()->log('Access The Terms and Conditions Page');
        $page_name = 'Terms & Conditions';
        $Terms = Term::All();
        $page_title = 'list';
        return view('admin.terms',compact('page_title','Terms','page_name'));
    }
    public function editTerm($id){
        activity()->log('Accessed the Edit Terms & Conditions Page');
        $Terms = Term::find($id);
        $page_title = 'formfiletext';//For Style Inheritance
        $page_name = $Terms->title;
        return view('admin.editTerm')->with('Terms',$Terms)->with('page_title',$page_title)->with('page_name',$page_name);
    }

    public function edit_term(Request $request, $id){
        activity()->log('Updated Terms ID number '.$id.' ');
       $updateDetails = array(
           'title'=>$request->title,
           'content' =>$request->content
       );
       DB::table('terms')->where('id',$id)->update($updateDetails);
       Session::flash('message', "Changes have been saved");
        return Redirect::back();
    }

    public function delete_term($id){
        activity()->log('Deleted Terms ID number '.$id.' ');
        DB::table('terms')->where('id',$id)->delete();
        return Redirect::back();
    }

    public function addPrivacy(){
        activity()->log('Access The Privacy Policy Page');
        $page_name = 'Add Privacy Policy';
        $page_title = 'formfiletext';//For Style Inheritance
        return view('admin.addPrivacy',compact('page_title','page_name'));
    }

    public function add_privacy(Request $request){
        activity()->log('Access The Add Privacy Page');
        $privacy = new Privacy;
        $privacy->title = $request->title;
        $privacy->content = $request->content;
        $privacy->save();
        Session::flash('message', "Content Has been Added");
        return Redirect::back();
    }

    public function privacy(){
        activity()->log('Accessed The All Privacy Privacy Page');
        $Privacy = Privacy::All();
        $page_name = 'Privacy Policies';
        $page_title = 'list';
        return view('admin.privacy',compact('page_title','Privacy','page_name'));
    }
    public function editPrivacy($id){
        activity()->log('Accessed Edit Privacy Policy ID number '.$id.' ');
        $Privacy = Privacy::find($id);
        $page_name = $Privacy->title;
        $page_title = 'formfiletext';//For Style Inheritance

        return view('admin.editPrivacy')->with('Privacy',$Privacy)->with('page_name',$page_name)->with('page_title',$page_title);
    }

    public function edit_privacy(Request $request, $id){
        activity()->log('Edited Privacy Policy ID number '.$id.' ');
       $updateDetails = array(
           'title'=>$request->title,
           'content' =>$request->content
       );
       DB::table('privacies')->where('id',$id)->update($updateDetails);
       Session::flash('message', "Changes have been saved");
        return Redirect::back();
    }

    public function delete_privacy($id){
        activity()->log('Deleted Privacy Policy ID number '.$id.' ');
        DB::table('privacies')->where('id',$id)->delete();
        return Redirect::back();
    }

    // Sliders
    public function slider(){
        activity()->log('Accessed All Sliders Page');
        $Slider = Slider::all();
        $page_title = 'list';
        $page_name = 'Home Page Slider';
        return view('admin.slider',compact('page_title','Slider','page_name'));
    }

    public function addSlider(){
        activity()->log('Add Slider Page');
        $page_title = 'formfiletext';
        $page_name = 'Add Home Page Slider';
        return view('admin.addSlider',compact('page_title','page_name'));
    }

    public function add_Slider(Request $request){
        activity()->log('Evoked an add Slider Operation ');
        $path = 'uploads/slider';
        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $file->move($path, $filename);
        $image = $filename;
        $Slider = new Slider;
        $Slider->name = $request->name;
        $Slider->content = $request->content;
        $Slider->image = $image;
        $Slider->save();
        Session::flash('message', "Slider Image Has Been Added");
        return Redirect::back();
    }

    public function editSlider($id){
        activity()->log('Accessed Page Slider With number '.$id.' ');
        $Slider = Slider::find($id);
        $page_title = 'formfiletext';
        $page_name = 'Edit Home Page Slider';
        return view('admin.editSlider',compact('page_title','Slider','page_name'));
    }

    public function edit_Slider(Request $request, $id){
        activity()->log('Edited Slider ID number '.$id.' ');
        $path = 'uploads/slider';
        if(isset($request->image)){
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move($path, $filename);
            $image = $filename;
        }else{
            $image = $request->image_cheat;
        }
        if(isset($request->thumbnail)){
            $file = $request->file('thumbnail');
            $filename = $file->getClientOriginalName();
            $file->move($path, $filename);
            $thumbnail = $filename;
        }else{
            $thumbnail = $request->thumbnail_cheat;
        }
        $updateDetails = array(
            'text1'=>$request->text1,
            'text2'=>$request->text2,
            'text3'=>$request->text3,
            'text4'=>$request->text4,
            'text5'=>$request->text5,
            'type'=>$request->type,
            'action_name'=>$request->action_name,
            'action' =>$request->action,
            'thumbnail' => $thumbnail,
            'image' =>$image
        );
        DB::table('sliders')->where('id',$id)->update($updateDetails);
        Session::flash('message', "Changes have been saved");
        return Redirect::back();
    }

    public function deleteSlider($id){
        activity()->log(' Deleted Slider Number '.$id.'');
        DB::table('slider')->where('id',$id)->delete();
        return Redirect::back();
    }

    public function banners(){
        activity()->log('Accessed All Banners');
        $Banner = Banner::all();
        $page_title = 'list';
        $page_name = 'Banners';
        return view('admin.banner',compact('page_title','Banner','page_name'));
    }

    public function editBanner($id){
        activity()->log('Accessed Edit Banner ID number '.$id.' ');
        $Banner = Banner::find($id);
        $page_title = 'formfiletext';
        $page_name = 'Site Banner';
        return view('admin.editBanner',compact('page_title','Banner','page_name'));
    }

    public function edit_Banner(Request $request, $id){
        activity()->log('Evoked Edit Banner For Banner ID number '.$id.' ');
        $path = 'uploads/banners';
        if(isset($request->image)){
            $file = $request->file('image');
            $filename = str_replace(' ', '', $file->getClientOriginalName());

            $file->move($path, $filename);
            $image = $filename;
        }else{
            $image = $request->image_cheat;
        }
        $updateDetails = array(
            'link'=>$request->link,
            'link_name'=>$request->link_name,
            'title'=>$request->title,
            'content' =>$request->content,
            'image' =>$image
        );
        DB::table('banners')->where('id',$id)->update($updateDetails);
        Session::flash('message', "Changes have been saved");
        return Redirect::back();
    }

    //Messages
    public function allMessages(){
        activity()->log('Accessed All Messages');
        $Message = Message::all();
        $page_title = 'list';
        $page_name = 'Messages';
        return view('admin.allMessages',compact('page_title','Message','page_name'));
    }
    public function unread(){
        activity()->log('Accessed Unread Messages');
        $Message = DB::table('messages')->where('status','0')->get();
        $page_title = 'list';
        $page_name = 'Messages';
        return view('admin.allMessages',compact('page_title','Message','page_name'));
    }
    public function read($id){
        activity()->log('Read Message ID number '.$id.' ');
        $Message = Message::find($id);
        $page_title = 'formfiletext';
        $page_name = 'Messages';
        return view('admin.read',compact('page_title','Message','page_name'));
    }
    public function reply(Request $request,$id){
        activity()->log('Replied Message ID number '.$id.' ');
        $reply = $request->message;
        $subject = $request->subject;
        $name = $request->name;
        $email = $request->email;
        ReplyMessage::SendMessage($reply,$subject,$name,$email,$id);
    }
    public function deleteMessage($id){
        activity()->log('Deleted Message ID number '.$id.' ');
        DB::table('messages')->where('id',$id)->delete();
        return Redirect::back();
    }

    // Categories Here
    public function categories(){
        activity()->log('Accessed All Categories');
        $Category = Category::all();
        $page_title = 'list';
        $page_name = 'Categories';
        return view('admin.categories',compact('page_title','Category','page_name'));
    }

    public function addCategory(){
        activity()->log('Accessed Add Category Page');
        $page_title = 'formfiletext';
        $page_name = 'Add Category';
        return view('admin.addCategory',compact('page_title','page_name'));
    }

    public function add_Category(Request $request){
        activity()->log('Evoked add Category Operation');
        $path = 'uploads/categories';
        if(isset($request->image)){
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move($path, $filename);
            $image = $filename;
        }else{
            $image = "0";
        }
        $Category = new Category;
        $Category->title = $request->title;
        $Category->slung = Str::slug($request->title);
        $Category->content = $request->content;
        $Category->image = $image;
        $Category->save();
        Session::flash('message', "Category Has Been Added");
        return Redirect::back();
    }

    public function editCategories($id){
        activity()->log('Access Edit Category ID number '.$id.' ');
        $Category = Category::find($id);
        $page_title = 'formfiletext';
        $page_name = 'Edit Home Page Slider';
        return view('admin.editCategory',compact('page_title','Category','page_name'));
    }

    public function edit_Category(Request $request, $id){
        activity()->log('Evoked Edit Category For Category ID number '.$id.' ');
        $path = 'uploads/categories';
            if(isset($request->image)){
                $file = $request->file('image');
                $filename = $file->getClientOriginalName();
                $file->move($path, $filename);
                $image = $filename;
            }else{
                $image = $request->image_cheat;
            }

        $updateDetails = array(
            'title'=>$request->title,
            'slung' => Str::slug($request->title),
            'content'=>$request->content,
            'image'=>$image

        );
        DB::table('categories')->where('id',$id)->update($updateDetails);
        Session::flash('message', "Changes have been saved");
        return Redirect::back();
    }

    public function deleteCategory($id){
        activity()->log('Deleted Category ID number '.$id.' ');
        DB::table('categories')->where('id',$id)->delete();
        return Redirect::back();
    }

      // Brands Here
    public function brands(){
        activity()->log('Accessed All Brands');
        $Brand = Brand::all();
        $page_title = 'list';
        $page_name = 'Brands';
        return view('admin.brands',compact('page_title','Brand','page_name'));
    }

    public function addBrand(){
        activity()->log('Accessed Add Brand Page');
        $page_title = 'formfiletext';
        $page_name = 'Add Brand';
        return view('admin.addBrand',compact('page_title','page_name'));
    }

    public function add_Brand(Request $request){
        activity()->log('Evoked add Brand Operation');
        $path = 'uploads/brands';
        if(isset($request->image)){
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move($path, $filename);
            $image = $filename;
        }else{
            $image = "0";
        }
        $Brand = new Brand;
        $Brand->title = $request->title;

        $Brand->image = $image;
        $Brand->save();
        Session::flash('message', "Brand Has Been Added");
        return Redirect::back();
    }

    public function editBrands($id){
        activity()->log('Access Edit Brand ID number '.$id.' ');
        $Brand = Brand::find($id);
        $page_title = 'formfiletext';
        $page_name = 'Edit Home Page Slider';
        return view('admin.editBrand',compact('page_title','Brand','page_name'));
    }

    public function edit_Brand(Request $request, $id){
        activity()->log('Evoked Edit Brand For Brand ID number '.$id.' ');
        $path = 'uploads/brands';
            if(isset($request->image)){
                $file = $request->file('image');
                $filename = $file->getClientOriginalName();
                $file->move($path, $filename);
                $image = $filename;
            }else{
                $image = $request->image_cheat;
            }

        $updateDetails = array(
            'title'=>$request->title,

            'image'=>$image

        );
        DB::table('brands')->where('id',$id)->update($updateDetails);
        Session::flash('message', "Changes have been saved");
        return Redirect::back();
    }

    public function deleteBrand($id){
        activity()->log('Deleted Brand ID number '.$id.' ');
        DB::table('brands')->where('id',$id)->delete();
        return Redirect::back();
    }

    // Products
    public function products(){
        activity()->log('Accessed All Products');
        $Product = Product::all();
        $page_title = 'list';
        $page_name = 'Products';
        return view('admin.products',compact('page_title','Product','page_name'));
    }

    public function addProduct(){
        $Category = Category::all();
        activity()->log('Accessed Add Product Page');
        $page_title = 'formfiletext';
        $page_name = 'Add Product';
        return view('admin.addProduct',compact('page_title','page_name','Category'));
    }

    public function add_Product(Request $request){
        activity()->log('Evoked add Product Operation');
        $path = 'public/uploads/products';
        if(isset($request->image_one)){
            $file = $request->file('image_one');
            $filename = $file->getClientOriginalName();
            $file->move($path, $filename);
            $image_one = $filename;
        }else{
            $image_one = "0";
        }

        if(isset($request->image_two)){
            $file = $request->file('image_two');
            $filename = $file->getClientOriginalName();
            $file->move($path, $filename);
            $image_two = $filename;
        }else{
            $image_two = "0";
        }

        if(isset($request->image_three)){
            $file = $request->file('image_three');
            $filename = $file->getClientOriginalName();
            $file->move($path, $filename);
            $image_three = $filename;
        }else{
            $image_three = "0";
        }

        $Product = new Product;
        $Product->name = $request->title;
        $Product->slung = Str::slug($request->title);
        $Product->meta = $request->meta;
        $Product->category = $request->category;
        $Product->pro_condition = $request->condition;
        $Product->brand = $request->brand;
        $Product->stock = $request->stock;
        $Product->price_raw = $request->price;
        $Product->price = $request->price;
        $Product->content = $request->content;
        $Product->image_one = $image_one;
        $Product->image_two = $image_two;
        $Product->image_three = $image_three;
        $Product->save();
        Session::flash('message', "Product Has Been Added");
        return Redirect::back();
    }

    public function editProducts($id){
        $Category = Category::all();
        activity()->log('Access Edit Product ID number '.$id.' ');
        $Product = Product::find($id);
        // dd($Product);
        $page_title = 'formfiletext';
        $page_name = 'Edit Home Page Slider';
        return view('admin.editProduct',compact('page_title','Product','page_name','Category'));
    }

    public function edit_Product(Request $request, $id){
        // activity()->log('Evoked Edit Product For Product ID number '.$id.' ');
        $path = 'public/uploads/products';
            if(isset($request->image_one)){
                $file = $request->file('image_one');
                $filename = $file->getClientOriginalName();
                $file->move($path, $filename);
                $image_one = $filename;
            }else{
                $image_one = $request->image_one_cheat;
            }

            if(isset($request->image_two)){
                $file = $request->file('image_two');
                $filename = $file->getClientOriginalName();
                $file->move($path, $filename);
                $image_two = $filename;
            }else{
                $image_two = $request->image_two_cheat;
            }

            if(isset($request->image_three)){
                $file = $request->file('image_three');
                $filename = $file->getClientOriginalName();
                $file->move($path, $filename);
                $image_three = $filename;
            }else{
                $image_three = $request->image_three_cheat;
            }
            if(isset($request->image_four)){
                $file = $request->file('image_four');
                $filename = $file->getClientOriginalName();
                $file->move($path, $filename);
                $image_four = $filename;
            }else{
                $image_four = $request->image_four_cheat;
            }


        if($request->stock == 'on'){
            $new_stock = "In Stock";
        }else{
            $new_stock = 'Out Of Stock';
        }
        $updateDetails = array(
            'name'=>$request->title,
            
            'content'=>$request->content,
            'meta'=>$request->meta,
            'pro_condition'=>$request->condition,
            'stock'=>$new_stock,
            'price'=>$request->price,
            'category'=>$request->category,
            'brand'=>$request->brand,
            'image_one'=>$image_one,
            'image_two'=>$image_two,
            'image_three'=>$image_three,
            'image_four'=>$image_four

        );
        DB::table('products')->where('id',$id)->update($updateDetails);
        Session::flash('message', "Changes have been saved");
        return Redirect::back();
    }

    public function deleteProduct($id){
        activity()->log('Deleted Product ID number '.$id.' ');
        DB::table('products')->where('id',$id)->delete();
        return Redirect::back();
    }

    // Services
    public function services(){
        activity()->log('Accessed All Services');
        $Service = Service::all();
        $page_title = 'list';
        $page_name = 'Services';
        return view('admin.services',compact('page_title','Service','page_name'));
    }




    public function editServices($id){
        $Category = Category::all();
        activity()->log('Access Edit Service ID number '.$id.' ');
        $Service = Service::find($id);
        $page_title = 'formfiletext';
        $page_name = 'Edit Home Page Slider';
        return view('admin.editService',compact('page_title','Service','page_name','Category'));
    }

    public function edit_Service(Request $request, $id){
        activity()->log('Evoked Edit Service For Service ID number '.$id.' ');
        $path = 'uploads/services';
            if(isset($request->image_one)){
                $file = $request->file('image_one');
                $filename = $file->getClientOriginalName();
                $file->move($path, $filename);
                $image_one = $filename;
            }else{
                $image_one = $request->image_cheat;
            }


        $updateDetails = array(
            'title'=>$request->title,
            'slung' => Str::slug($request->title),
            'content'=>$request->meta,
            'content_one'=>$request->content,
            'image'=>$image_one,
        );
        DB::table('services')->where('id',$id)->update($updateDetails);
        Session::flash('message', "Changes have been saved");
        return Redirect::back();
    }

    public function deleteService($id){
        activity()->log('Deleted Service ID number '.$id.' ');
        DB::table('services')->where('id',$id)->delete();
        return Redirect::back();
    }

    // Products

     // Manage Users
     public function admins(){
        activity()->log('Accessed All Admins Page');
        $Users = DB::table('users')->where('is_admin','1')->get();
        $page_title = 'list';
        $page_name = 'Admins';
        return view('admin.admins',compact('page_title','Users','page_name'));
    }

    public function users(){
        activity()->log('Access All users Page');
        $Users = DB::table('users')->where('is_admin','0')->get();
        $page_title = 'list';
        $page_name = 'Users';
        return view('admin.users',compact('page_title','Users','page_name'));
    }

    public function addUser(){
        activity()->log('Access Addd user Page');
        $page_title = 'formfiletext';
        $page_name = 'Add User';
        return view('admin.addUser',compact('page_title','page_name'));
    }

    public function add_User(Request $request){
        activity()->log('Evoked and add User Operation');
        $path = 'uploads/users';
        if(isset($request->image)){
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move($path, $filename);
            $image = $filename;
        }else{
            $image = "0";
        }

        $Password = $request->mobile;
        $password = Hash::make($Password);
        $User = new User;
        $User->name = $request->name;
        $User->email = $request->email;
        $User->mobile = $request->mobile;
        $User->address = $request->address;
        $User->country = $request->country;
        $User->is_admin = $request->is_admin;
        $User->password = $password;
        $User->image = $image;
        $User->save();
        Session::flash('message', "User Has Been Added");
        return Redirect::back();
    }

    public function editUser($id){
        activity()->log('Edited User ID number '.$id.' ');
        $User = User::find($id);
        $page_title = 'formfiletext';
        $page_name = 'Edit User';
        return view('admin.editUser',compact('page_title','User','page_name'));
    }

    public function edit_User(Request $request, $id){
        activity()->log('Evoked an edit user for user with ID number '.$id.' ');
        $path = 'uploads/users';
            if(isset($request->image)){
                $file = $request->file('image');
                $filename = $file->getClientOriginalName();
                $file->move($path, $filename);
                $image = $filename;
            }else{
                $image = $request->image_cheat;
            }
        $updateDetails = array(
            'name'=>$request->name,
            'email'=>$request->email,
            'mobile'=>$request->mobile,
            'address'=>$request->address,
            'image'=>$image

        );
        DB::table('users')->where('id',$id)->update($updateDetails);
        Session::flash('message', "Changes have been saved");
        return Redirect::back();
    }

    public function delete_user($id){
        activity()->log('Evoked a Delete user operations for ID number '.$id.' ');
        DB::table('users')->where('id',$id)->delete();
        return Redirect::back();
    }

    public function switchRole($id){
        activity()->log('Switched Role For User With ID number '.$id.' ');
        $GetUSer = DB::table('users')->where('id',$id)->get();
        foreach ($GetUSer as $key => $value) {
            if($value->is_admin == 1){
                $new_value = 0;
                $updateDetails = array(
                    'is_admin'=>$new_value,
                );
            }else{
                $new_value = 1;
                $updateDetails = array(
                    'is_admin'=>$new_value,
                );
            }
            DB::table('users')->where('id',$id)->update($updateDetails);
            Session::flash('message', "User Roles Have Been Updated");
            return Redirect::back();
        }
    }

    public function switchStatus($id){
        activity()->log('Switched Status For User With ID number '.$id.' ');
        $GetUSer = DB::table('users')->where('id',$id)->get();
        foreach ($GetUSer as $key => $value) {
            if($value->status == 1){
                $new_value = 0;
                $updateDetails = array(
                    'status'=>$new_value,
                );
            }else{
                $new_value = 1;
                $updateDetails = array(
                    'status'=>$new_value,
                );
            }
            DB::table('users')->where('id',$id)->update($updateDetails);
            Session::flash('message', "User Status Have Been Updated");
            return Redirect::back();
        }
    }



    //

    // Testimonials
    public function addTestimonial(){
        activity()->log('Accessed Add Testimonial Page');
        $page_title = 'formfiletext';//For Layout Inheritance
        $page_name = 'addTestimonial';
        return view('admin.addTestimonial',compact('page_title','page_name'));
    }

    public function add_Testimonial(Request $request){
        activity()->log('Evoked an Add Testimonial Operation');

        $path = 'uploads/testimonials';
        if(isset($request->image)){
                $file = $request->file('image');
                $filename = str_replace(' ', '', $file->getClientOriginalName());
                $timestamp = new Datetime();
                $new_timestamp = $timestamp->format('Y-m-d H:i:s');
                $image_main_temp = $new_timestamp.'image'.$filename;
                $image = str_replace(' ', '',$image_main_temp);
                $file->move($path, $image);
                }
        else{
            $image = $request->pro_img_cheat;
        }





        $Testimonial = new Testimonial;
        $Testimonial->name = $request->name;
        $Testimonial->content = $request->content;
        $Testimonial->company = $request->company;
        $Testimonial->position = $request->position;
        $Testimonial->rating = $request->rating;
        $Testimonial->image = $image;
        $Testimonial->save();
        Session::flash('message', "Testimonial Has Been Added");
        return Redirect::back();
    }

    public function testimonials(){
        activity()->log('Accessed The All testimonials page');
        $Testimonial = Testimonial::all();
        $page_title = 'list';
        $page_name = 'Testimonial';
        return view('admin.testimonial',compact('page_title','Testimonial','page_name'));
    }

    public function editTestimonial($id){
        activity()->log('Accessed Edit Testimonial With ID number '.$id.' ');
        $Testimonial = Testimonial::find($id);
        $page_title = 'formfiletext';
        $page_name = 'Edit Testimonial';
        return view('admin.editTestimonial',compact('page_title','Testimonial','page_name'));
    }


    public function edit_Testimonial(Request $request, $id){
        activity()->log('Evoked Edit Testimonial For ID number '.$id.' ');
        $path = 'uploads/testimonials';
        if(isset($request->image)){
                $file = $request->file('image');
                $filename = str_replace(' ', '', $file->getClientOriginalName());
                $timestamp = new Datetime();
                $new_timestamp = $timestamp->format('Y-m-d H:i:s');
                $image_main_temp = $new_timestamp.'image'.$filename;
                $image = str_replace(' ', '',$image_main_temp);
                $file->move($path, $image);

        }else{
            $image = $request->image_cheat;
        }




        $updateDetails = array(
            'name' => $request->name,
            'content' => $request->content,
            'rating' => $request->rating,
            'company' => $request->company,
            'position' => $request->position,

            'image' =>$image,


        );
        DB::table('testimonials')->where('id',$id)->update($updateDetails);
        Session::flash('message', "Changes have been saved");
        return Redirect::back();
    }

    public function deleteTestimonial($id){
        activity()->log('Evoked a Delete Testimonial For ID number '.$id.' ');
        DB::table('testimonials')->where('id',$id)->delete();
        Session::flash('message', "Testimonial Has Been Deleted!");
        return Redirect::back();
    }



    public function addBlog(){
        activity()->log('Accessed Add Blog Page');
        $Category = DB::table('categories')->orderBy('id','DESC')->get();
        $page_title = 'formfiletext';//For Layout Inheritance
        $page_name = 'add Blog';
        return view('admin.addBlog',compact('page_title','page_name','Category'));
    }

    public function add_Blog(Request $request){
        activity()->log('Evoked an add Blog Operation');
        $title = $request->title;
        $description = $request->content;



        $category = $request->cat;
        $path = 'uploads/blogs';
        if(isset($request->image_one)){


                $file = $request->file('image_one');
                $filename = str_replace(' ', '', $file->getClientOriginalName());
                $timestamp = new Datetime();
                $new_timestamp = $timestamp->format('Y-m-d H:i:s');
                $image_main_temp = $new_timestamp.'image'.$filename;
                $image_one = str_replace(' ', '',$image_main_temp);
                $file->move($path, $image_one);

        }else{
            $image_one = $request->pro_img_cheat;
        }

        $blog = new Blog;
        $blog->title = $request->title;
        $blog->meta = $request->meta;
        $blog->slung = Str::slug($request->title);
        $blog->content = $request->content;
        $blog->author = $request->author;
        $blog->category = $request->category;
        $blog->tags = $request->tags;
        $blog->image_one = $image_one;
        $blog->save();
        Session::flash('message', "Post Saved Successfully");
        return Redirect::back();




        $Blog->save();

        Session::flash('message', "Blog Has Been Added");
        return Redirect::back();
    }

    public function blog(){
        activity()->log('Accessed the all blogs page ');
        $Blog = Blog::all();
        $page_title = 'list';
        $page_name = 'Blog';
        return view('admin.blog',compact('page_title','Blog','page_name'));
    }

    public function editBlog($id){
        activity()->log('Accessed Edit Blog For Blog ID number '.$id.' ');
        $Category = DB::table('categories')->orderBy('id','DESC')->get();
        $Blog = Blog::find($id);
        $page_title = 'formfiletext';
        $page_name = 'Edit Blog';
        return view('admin.editBlog',compact('page_title','Blog','page_name','Category'));
    }


    public function edit_Blog(Request $request, $id){
        activity()->log('Evoked an Edit Blog Operation For Blog ID number '.$id.' ');
        $path = 'uploads/blogs';
        if(isset($request->image_one)){


                $file = $request->file('image_one');
                $filename = str_replace(' ', '', $file->getClientOriginalName());
                $timestamp = new Datetime();
                $new_timestamp = $timestamp->format('Y-m-d H:i:s');
                $image_main_temp = $new_timestamp.'image'.$filename;
                $image_one = str_replace(' ', '',$image_main_temp);
                $file->move($path, $image_one);

        }else{
            $image_one = $request->image_one_cheat;
        }

        if(isset($request->image_two)){

                $file = $request->file('image_two');
                $filename = str_replace(' ', '', $file->getClientOriginalName());
                $timestamp = new Datetime();
                $new_timestamp = $timestamp->format('Y-m-d H:i:s');
                $image_main_temp = $new_timestamp.'image'.$filename;
                $image_two = str_replace(' ', '',$image_main_temp);
                $file->move($path, $image_two);

        }else{
            $image_two = $request->image_two_cheat;
        }


        if(isset($request->image_three)){

                $file = $request->file('image_three');
                $filename = str_replace(' ', '', $file->getClientOriginalName());
                $timestamp = new Datetime();
                $new_timestamp = $timestamp->format('Y-m-d H:i:s');
                $image_main_temp = $new_timestamp.'image'.$filename;
                $image_three = str_replace(' ', '',$image_main_temp);
                $file->move($path, $image_three);

        }else{
            $image_three = $request->image_three_cheat;
        }
        //Additional images

        if(isset($request->image_four)){
                $file = $request->file('image_four');
                $filename = str_replace(' ', '', $file->getClientOriginalName());
                $timestamp = new Datetime();
                $new_timestamp = $timestamp->format('Y-m-d H:i:s');
                $image_main_temp = $new_timestamp.'image'.$filename;
                $image_four = str_replace(' ', '',$image_main_temp);
                $file->move($path, $image_four);

        }else{
            $image_four = $request->image_four_cheat;
        }

        $updateDetails = array(
            'title' => $request->title,
            'slung' => Str::slug($request->title),
            'content' => $request->content,
            'author' => $request->author,
            'category' => $request->category,
            'tags' => $request->tags,
            'image_one' =>$image_one,
            'image_two' =>$image_two,
            'image_three' =>$image_three,
            'image_four' =>$image_four,
        );
        DB::table('blogs')->where('id',$id)->update($updateDetails);
        Session::flash('message', "Changes have been saved");
        return Redirect::back();
    }

    public function delete_Blog($id){
        activity()->log('Deleted Blog With ID number '.$id.' ');
        DB::table('blogs')->where('id',$id)->delete();
        Session::flash('message', "Post Deleted Successfully");
        return Redirect::back();
    }

    public function b2b(){
        activity()->log('Accessed The B2B Table ');
        $B2B = DB::table('b2b_api_response')->get();
        $page_title = 'list';
        $page_name = 'Blog';
        return view('admin.b2b',compact('page_title','B2B','page_name'));
    }

    public function b2c(){
        activity()->log('Accessed The B2C Table ');
        $B2C = DB::table('b2c_api_response')->get();
        $page_title = 'list';
        $page_name = 'Blog';
        return view('admin.b2c',compact('page_title','B2C','page_name'));
    }

    public function lnmo_api_response(){
        activity()->log('Accessed The Lipa na M-PESA Online Table ');
        $LNMO = DB::table('lnmo_api_response')->get();
        $page_title = 'list';
        $page_name = 'Blog';
        return view('admin.lnmo_api_response',compact('page_title','LNMO','page_name'));
    }

    public function mobile_payments(){
        activity()->log('Accessed The C2B Table ');
        $C2B = DB::table('mobile_payments')->get();
        $page_title = 'list';
        $page_name = 'Blog';
        return view('admin.mobile_payments',compact('page_title','C2B','page_name'));
    }

    public function reverse_transaction(){
        activity()->log('Accessed The Reverse Transaction Table ');
        $Reverse = DB::table('reverse_transaction')->get();
        $page_title = 'list';
        $page_name = 'Blog';
        return view('admin.reverse_transaction',compact('page_title','Reverse','page_name'));
    }


    public function transaction_status(){
        activity()->log('Accessed The Transaction Status Table ');
        $Transaction = DB::table('transaction_status')->get();
        $page_title = 'list';
        $page_name = 'Blog';
        return view('admin.transaction_status',compact('page_title','Transaction','page_name'));
    }


    public function accountbalance(){
        activity()->log('Accessed The Account Balance Table ');
        $Accountbalance = DB::table('accountbalance')->get();
        $page_title = 'list';
        $page_name = 'Blog';
        return view('admin.accountbalance',compact('page_title','Accountbalance','page_name'));
    }
    //////FAQ
    public function addFaq(){
        activity()->log('Access The Add FAQ Page');
        $Category = DB::table('categories')->orderBy('id','DESC')->get();
        $page_name = 'Add FAQ';
        $page_title = 'formfiletext';//For Style Inheritance
        return view('admin.addFaq',compact('page_title','page_name','Category'));
    }

    public function add_Faq(Request $request){
        activity()->log('Access The Add FAQ Page');
        $FAQ = new FAQ;
        $FAQ->title = $request->title;
        $FAQ->slung = Str::slug($request->title);
        $FAQ->category = $request->category;
        $FAQ->meta = $request->meta;
        $FAQ->content = $request->content;
        $FAQ->save();
        Session::flash('message', "Content Has been Added");
        return Redirect::back();
    }

    public function faq(){
        activity()->log('Accessed The All FAQ Page');
        $FAQ = FAQ::All();
        $page_name = 'Privacy Policies';
        $page_title = 'list';
        return view('admin.faq',compact('page_title','FAQ','page_name'));
    }

    public function editFaq($id){
        activity()->log('Accessed FAQ Edit ID number '.$id.' ');
        $Category = DB::table('categories')->orderBy('id','DESC')->get();
        $FAQ = FAQ::find($id);
        $page_name = $FAQ->title;
        $page_title = 'formfiletext';//For Style Inheritance

        return view('admin.editFaq')->with('FAQ',$FAQ)->with('page_name',$page_name)->with('Category',$Category)->with('page_title',$page_title);
    }

    public function edit_Faq(Request $request, $id){
        activity()->log('Edited FAQ ID number '.$id.' ');
    $updateDetails = array(
        'title'=>$request->title,
        'category'=>$request->category,
        'slung' => Str::slug($request->title),
        'meta'=>$request->meta,
        'content' =>$request->content
    );
    DB::table('faq')->where('id',$id)->update($updateDetails);
    Session::flash('message', "Changes have been saved");
        return Redirect::back();
    }

    public function delete_Faq($id){
        activity()->log('Deleted FAQ ID number '.$id.' ');
        DB::table('faq')->where('id',$id)->delete();
        return Redirect::back();
    }

    // How It Works
    public function addHow(){
        activity()->log('Access The Add How Its Works Page');
        $Category = DB::table('categories')->orderBy('id','DESC')->get();
        $page_name = 'Add How It Works';
        $page_title = 'formfiletext';//For Style Inheritance
        return view('admin.addHow',compact('page_title','page_name','Category'));
    }

    public function add_How(Request $request){
        activity()->log('Evoked Add How It worked');
        $FAQ = new How;
        $FAQ->title = $request->title;
        $FAQ->slung = Str::slug($request->title);
        $FAQ->content = $request->content;
        $FAQ->save();
        Session::flash('message', "Content Has been Added");
        return Redirect::back();
    }

    public function how(){
        activity()->log('Accessed The All How it works Page');
        $How = How::All();
        $page_name = 'Privacy Policies';
        $page_title = 'list';
        return view('admin.how',compact('page_title','How','page_name'));
    }

    public function editHow($id){
        activity()->log('Accessed FAQ Edit ID number '.$id.' ');
        $Category = DB::table('categories')->orderBy('id','DESC')->get();
        $How = How::find($id);
        $page_name = $How->title;
        $page_title = 'formfiletext';//For Style Inheritance
        return view('admin.editHow')->with('How',$How)->with('page_name',$page_name)->with('Category',$Category)->with('page_title',$page_title);
    }

    public function edit_How(Request $request, $id){
        activity()->log('Edited FAQ ID number '.$id.' ');
        $updateDetails = array(
            'title'=>$request->title,
            'slung' => Str::slug($request->title),
            'content' =>$request->content
        );
        DB::table('hows')->where('id',$id)->update($updateDetails);
        Session::flash('message', "Changes have been saved");
            return Redirect::back();
        }

    public function delete_How($id){
        activity()->log('Deleted FAQ ID number '.$id.' ');
        DB::table('hows')->where('id',$id)->delete();
        return Redirect::back();
    }

    // Add Course
    public function addCourse(){
        activity()->log('Access The Add How Its Works Page');
        $Category = DB::table('categories')->orderBy('id','DESC')->get();
        $page_name = 'Add How It Works';
        $page_title = 'formfiletext';//For Style Inheritance
        return view('admin.addCourse',compact('page_title','page_name','Category'));
    }

    public function add_Course(Request $request){
        activity()->log('Evoked Add Course');
        $path = 'uploads/courses';
        if(isset($request->image)){
                $file = $request->file('image');
                $filename = str_replace(' ', '', $file->getClientOriginalName());
                $timestamp = new Datetime();
                $new_timestamp = $timestamp->format('Y-m-d H:i:s');
                $image_main_temp = $new_timestamp.'image'.$filename;
                $image = str_replace(' ', '',$image_main_temp);
                $file->move($path, $image);
        }else{
            $image = '0';
        }

        if(isset($request->icon)){
            $file = $request->file('icon');
            $filename = str_replace(' ', '', $file->getClientOriginalName());
            $timestamp = new Datetime();
            $new_timestamp = $timestamp->format('Y-m-d H:i:s');
            $image_main_temp = $new_timestamp.'icon'.$filename;
            $icon = str_replace(' ', '',$image_main_temp);
            $file->move($path, $icon);
        }else{
            $icon = '0';
        }

        $Course = new Course;
        $Course->title = $request->title;
        $Course->price = $request->price;
        $Course->slung = Str::slug($request->title);
        $Course->content = $request->content;
        $Course->meta = $request->meta;
        $Course->icon = $icon;
        $Course->image = $image;
        $Course->save();
        Session::flash('message', "Content Has been Added");
        return Redirect::back();
    }

    public function courses(){
        activity()->log('Accessed All Courses Page');
        $Course = Course::All();
        $page_name = 'All Courses';
        $page_title = 'list';
        return view('admin.courses',compact('page_title','Course','page_name'));
    }

    public function editCourse($id){
        activity()->log('Accessed Course Edit ID number '.$id.' ');
        $Category = DB::table('courses')->orderBy('id','DESC')->get();
        $Course = Course::find($id);
        $page_name = $Course->title;
        $page_title = 'formfiletext';//For Style Inheritance
        return view('admin.editCourse')->with('Course',$Course)->with('page_name',$page_name)->with('Category',$Category)->with('page_title',$page_title);
    }

    public function edit_Course(Request $request, $id){
        $path = 'uploads/courses';
        if(isset($request->image)){
            $file = $request->file('image');
            $filename = str_replace(' ', '', $file->getClientOriginalName());
            $timestamp = new Datetime();
            $new_timestamp = $timestamp->format('Y-m-d H:i:s');
            $image_main_temp = $new_timestamp.'image'.$filename;
            $image = str_replace(' ', '',$image_main_temp);
            $file->move($path, $image);
        }else{
            $image = $request->image_cheat;
        }

        if(isset($request->icon)){
            $file = $request->file('icon');
            $filename = str_replace(' ', '', $file->getClientOriginalName());
            $timestamp = new Datetime();
            $new_timestamp = $timestamp->format('Y-m-d H:i:s');
            $image_main_temp = $new_timestamp.'icon'.$filename;
            $icon = str_replace(' ', '',$image_main_temp);
            $file->move($path, $icon);
        }else{
            $icon = $request->icon_cheat;
        }

        activity()->log('Edited Course ID number '.$id.' ');
        $updateDetails = array(
            'title'=>$request->title,
            'slung' => Str::slug($request->title),
            'content' =>$request->content,
            'meta' =>$request->meta,
            'price' =>$request->price,
            'meta' =>$request->meta,
            'icon' =>$icon,
            'image' =>$image,
        );
        DB::table('courses')->where('id',$id)->update($updateDetails);
        Session::flash('message', "Changes have been saved");
            return Redirect::back();
    }

    public function delete_Course($id){
        activity()->log('Deleted Course ID number '.$id.' ');
        DB::table('courses')->where('id',$id)->delete();
        return Redirect::back();
    }

    // Add Topic
    public function addTopic(){
        $Course = Course::all();
        activity()->log('Access The Add Topics');
        $Category = DB::table('categories')->orderBy('id','DESC')->get();
        $page_name = 'Add How It Works';
        $page_title = 'formfiletext';//For Style Inheritance
        return view('admin.addTopic',compact('page_title','page_name','Course'));
    }


    public function add_Topic(Request $request){
        activity()->log('Evoked Add Topic');
        $path = 'uploads/topics';
        if(isset($request->image)){
                $file = $request->file('image');
                $filename = str_replace(' ', '', $file->getClientOriginalName());
                $timestamp = new Datetime();
                $new_timestamp = $timestamp->format('Y-m-d H:i:s');
                $image_main_temp = $new_timestamp.'image'.$filename;
                $image = str_replace(' ', '',$image_main_temp);
                $file->move($path, $image);
        }else{
            $image = '0';
        }

        if($request->bonus == 'on'){
            $is_bonus = 1;
         }else{
             $is_bonus = 0;
         }

        $encrypted = Crypt::encryptString(Str::slug($request->title));

        $Topic = new Topic;
        $Topic->course_id = $request->course_id;
        $Topic->title = $request->title;
        $Topic->slung = Str::slug($request->title);
        $Topic->content = $request->content;
        $Topic->is_bonus = $is_bonus;
        $Topic->video_encryption = $encrypted;
        $Topic->meta = $request->meta;
        $Topic->placeholder = $image;
        $Topic->video = $request->video;
        $Topic->video_views = $request->video_views;
        $Topic->video_duration = $request->video_duration;

        $Topic->save();
        Session::flash('message', "Content Has been Added");
        return Redirect::back();
    }

    public function topics(){
        activity()->log('Accessed All Topics Page');
        $Topic = Topic::All();
        $page_name = 'All Topics';
        $page_title = 'list';
        return view('admin.topics',compact('page_title','Topic','page_name'));
    }

    public function editTopic($id){
        activity()->log('Accessed Topic Edit ID number '.$id.' ');
        $Course = Course::all();
        $Category = DB::table('topics')->orderBy('id','DESC')->get();
        $Topic = Topic::find($id);
        $page_name = $Topic->title;
        $page_title = 'formfiletext';//For Style Inheritance
        return view('admin.editTopic')->with('Topic',$Topic)->with('page_name',$page_name)->with('Course',$Course)->with('page_title',$page_title);
    }

    public function edit_Topic(Request $request, $id){
        $path = 'uploads/topics';
        if(isset($request->image)){
            $file = $request->file('image');
            $filename = str_replace(' ', '', $file->getClientOriginalName());
            $timestamp = new Datetime();
            $new_timestamp = $timestamp->format('Y-m-d H:i:s');
            $image_main_temp = $new_timestamp.'image'.$filename;
            $image = str_replace(' ', '',$image_main_temp);
            $file->move($path, $image);
        }else{
            $image = $request->image_cheat;
        }

        if($request->bonus == 'on'){
            $is_bonus = 1;
         }else{
             $is_bonus = 0;
         }

        $encrypted = Crypt::encryptString(Str::slug($request->title));
        activity()->log('Edited Topic ID number '.$id.' ');
        $updateDetails = array(
            'title'=>$request->title,
            'course_id'=>$request->course_id,
            'slung' => Str::slug($request->title),
            'content' =>$request->content,
            'video_encryption' =>$encrypted,
            'meta' =>$request->meta,
            'is_bonus' =>$is_bonus,
            'placeholder' =>$image,
            'video' =>$request->video,
            'video_views' =>$request->video_views,
            'video_duration' =>$request->video_duration,
        );
        DB::table('topics')->where('id',$id)->update($updateDetails);
        Session::flash('message', "Changes have been saved");
            return Redirect::back();
    }


    public function delete_Topic($id){
        activity()->log('Deleted Topic ID number '.$id.' ');
        DB::table('topics')->where('id',$id)->delete();
        return Redirect::back();
    }

    public function addSignal(){
        activity()->log('Accessed Add Signal Page');
        $page_title = 'formfiletext';//For Layout Inheritance
        $page_name = 'add Signal';
        return view('admin.addSignal',compact('page_title','page_name'));
    }

    public function add_Signal(Request $request){
        activity()->log('Evoked an add Signal Operation');

        $Signal = new Signal;
        $Signal->currency_pair = $request->currency_pair;
        $Signal->datetime = $request->datetime;
        $Signal->position = $request->position;
        $Signal->tp = $request->tp;
        $Signal->sl = $request->sl;
        $Signal->comments = $request->comments;
        $Signal->save();
        Session::flash('message', "Post Saved Successfully");
        return Redirect::back();

    }


    public function signals(){
        activity()->log('Accessed the all signals page ');
        $Signal = Signal::all();
        $page_title = 'list';
        $page_name = 'Signal';
        return view('admin.signals',compact('page_title','Signal','page_name'));
    }

    public function editSignal($id){
        activity()->log('Accessed Edit Signal For Signal ID number '.$id.' ');
        $Signal = Signal::find($id);
        $page_title = 'formfiletext';
        $page_name = 'Edit Signal';
        return view('admin.editSignal',compact('page_title','Signal','page_name'));
    }


    public function edit_Signal(Request $request, $id){
        activity()->log('Evoked an Edit Signal Operation For Signal ID number '.$id.' ');

        $updateDetails = array(
            'currency_pair' => $request->currency_pair,
            'datetime' => $request->datetime,
            'position' => $request->position,
            'tp' => $request->tp,
            'sl' => $request->sl,
            'comments' => $request->comments,
        );
        DB::table('signals')->where('id',$id)->update($updateDetails);
        Session::flash('message', "Changes have been saved");
        return Redirect::back();
    }


    public function delete_Signal($id){
        activity()->log('Deleted Signal With ID number '.$id.' ');
        DB::table('signals')->where('id',$id)->delete();
        Session::flash('message', "Post Deleted Successfully");
        return Redirect::back();
    }

    public function approve_transaction($id){
        activity()->log('Approve Transaction '.$id.' ');
        $GetPayments = DB::table('mobile_payments')->where('transLoID',$id)->get();
        foreach($GetPayments as $getPay){
            if($getPay->status == 1){
                $newStatus = '0';
            }else{
                $newStatus = '1';
            }
            $updateDetails = array(
                'status' => $newStatus,
            );
            DB::table('mobile_payments')->where('transLoID',$id)->update($updateDetails);
            Session::flash('message', "Updated Successfully");
            return Redirect::back();
        }

    }

    public function approve_transaction_stk($id){
        activity()->log('Approve STK Transaction '.$id.' ');
        $GetPayments = DB::table('lnmo_api_response')->where('lnmoID',$id)->get();
        foreach($GetPayments as $getPay){
            if($getPay->status == 1){
                $newStatus = '0';
            }else{
                $newStatus = '1';
            }
            $updateDetails = array(
                'status' => $newStatus,
            );
            DB::table('lnmo_api_response')->where('lnmoID',$id)->update($updateDetails);
            Session::flash('message', "Updated Successfully");
            return Redirect::back();
        }

    }


    public function enroll_users(){
        activity()->log('Accessed Entrol Users Page');
        $page_name = 'Enroll Users';
        $Users = \app\Models\User::all();
        $page_title = 'list';
        return view('admin.enroll_users',compact('page_title','Users','page_name'));
    }

    public function enroll_users_post($id){
        $User = User::find($id);
        activity()->log('Enroll Users Page');
        $page_name = 'Enroll Users';
        $page_title = 'list';
        return view('admin.enroll_users_post',compact('page_title','User','page_name'));
    }



    public function enroll_user_now(Request $request){
        $User_id = $request->user_id;
        activity()->log('Enrolling User');
        $page_name = 'Enroll Users';
        $page_title = 'list';
        $course_id = $request->course_id;

        $updateDetails = array(
            'course_registered_id' => $course_id,
        );
        // get user varialbles
        $User = User::find($User_id);
        $subject="User Approval";
        $Message="Dear $User->name, Your registration have been approved successfully";
        SendMails::approvePayment($User->name,$User->email,$subject,$Message);
        DB::table('users')->where('id',$User_id)->update($updateDetails);
        Session::flash('message', "User Enroled Successfully");
        return Redirect::back();
    }

    public function color(){
        activity()->log('Accessed the color Variations page ');
        $Variation = DB::table('variations')->where('type','color')->get();
        $page_title = 'list';
        $page_name = 'Variation';
        return view('admin.color',compact('page_title','Variation','page_name'));
    }

    public function size(){
        activity()->log('Accessed the size Variations page ');
        $Variation = DB::table('variations')->where('type','size')->get();
        $page_title = 'list';
        $page_name = 'Variation';
        return view('admin.size',compact('page_title','Variation','page_name'));
    }


    public function add_Variation(Request $request){
        $path = 'uploads/variations';
        if(isset($request->image)){
            $file = $request->file('image');
            $filename = str_replace(' ', '', $file->getClientOriginalName());
            $timestamp = new Datetime();
            $new_timestamp = $timestamp->format('Y-m-d H:i:s');
            $image_main_temp = $new_timestamp.'image'.$filename;
            $image = str_replace(' ', '',$image_main_temp);
            $file->move($path, $image);
        }else{
            $image = 0;
        }

        $Variation = new Variation;
        $Variation->type = $type = $request->type;
        $Variation->value = $value = $request->value;
        $Variation->image = $title = $image;
        $Variation->price = $price = $request->price;
        $Variation->product_id = $request->product_id;
        $Variation->save();
        Session::flash('message', "Variation Saved");
        return Redirect::back();
    }

    public function edit_Variation(Request $request, $id){
        $path = 'uploads/variations';
        if(isset($request->image)){
            $file = $request->file('image');
            $filename = str_replace(' ', '', $file->getClientOriginalName());
            $timestamp = new Datetime();
            $new_timestamp = $timestamp->format('Y-m-d H:i:s');
            $image_main_temp = $new_timestamp.'image'.$filename;
            $image = str_replace(' ', '',$image_main_temp);
            $file->move($path, $image);
        }else{
            $image = $request->image_cheat;
        }
        $updateDetails = array(
            'type' => $request->type,
            'value' => $request->value,

            'price' => $request->price,
            'image' => $image,
            'product_id' => $request->product_id,
        );
        DB::table('variations')->where('id',$id)->update($updateDetails);
        Session::flash('message', "Variation Updated");
        return Redirect::back();
    }


    public function variations_color(){
        $Product = Product::all();
        $Variation = DB::table('variations')->where('type','color')->get();
        $page_title = 'list';
        $page_name = 'Variation';
        return view('admin.addColor',compact('page_title','Variation','page_name','Product'));
    }

    public function variations_size(){
        $Product = Product::all();
        $Variation = DB::table('variations')->where('type','color')->get();
        $page_title = 'list';
        $page_name = 'Variation';
        return view('admin.addSize',compact('page_title','Variation','page_name','Product'));
    }

    public function var_color(){
        $Product = Product::all();
        $Variation = DB::table('variations')->where('type','color')->get();
        $page_title = 'list';
        $page_name = 'Variation';
        return view('admin.var_color',compact('page_title','Variation','page_name','Product'));
    }

    public function var_size(){
        $Variation = DB::table('variations')->where('type','size')->get();
        $page_title = 'list';
        $page_name = 'Variation';
        return view('admin.var_size',compact('page_title','Variation','page_name'));
    }

    public function editVariation($id){
        // check if its color or size
        $Variations = Variation::find($id);
        $Product = Product::all();
        if($Variations->type == 'color'){
            $page_title = 'list';
            $page_name = 'Color Variation';
            return view('admin.editColor',compact('page_title','Variations','page_name','Product'));
        }else{
            $page_title = 'list';
            $page_name = 'Size Variation';
            return view('admin.editSize',compact('page_title','Variations','page_name','Product'));
        }
    }


    // AJAX REQUESTS
    public function addCategoryAjaxRequest(Request $request){
        activity()->log('Evoked an Add Categorgy Request');
       $Category = new Category;
       $Category->title = $request->title;
       $Category->slung = Str::slug($request->title);

       if($Category->save()){
        return response()->json(['success'=>'Category Added Successfully!']);
       }else{
        return response()->json(['success'=>'Something went Wrong!']);
       }

    }

    public function deleteCategoryAjax(Request $request){
        activity()->log('Evoked a delete Categorgy Request');
        $id = $request->id;
        DB::table('categories')->where('id',$id)->delete();
        return response()->json(['success'=>'Deleted Successfully!']);
    }

    public function deleteBlogAjax(Request $request){
        activity()->log('Evoked a delete Blog Request');
        $id = $request->id;
        DB::table('blogs')->where('id',$id)->delete();
        return response()->json(['success'=>'Deleted Successfully!']);
    }

    public function deleteTestimonialAjax(Request $request){
        activity()->log('Evoked a delete Testimonial Request');
        $id = $request->id;
        DB::table('testimonials')->where('id',$id)->delete();
        return response()->json(['success'=>'Deleted Successfully!']);
    }

    public function deleteSliderAjax(Request $request){
        activity()->log('Evoked a delete Slider Request');
        $id = $request->id;
        DB::table('sliders')->where('id',$id)->delete();
        return response()->json(['success'=>'Deleted Successfully!']);
    }

    public function deleteTransactionAjax(Request $request){
        activity()->log('Evoked a delete Transaction Request');
        $id = $request->id;
        DB::table('transaction_status')->where('id',$id)->delete();
        return response()->json(['success'=>'Deleted Successfully!']);
    }

    public function deleteReverseAjax(Request $request){
        activity()->log('Evoked a delete Reverse Transaction Request');
        $id = $request->id;
        DB::table('reverse_transaction')->where('id',$id)->delete();
        return response()->json(['success'=>'Deleted Successfully!']);
    }

    public function deleteSTKAjax(Request $request){
        activity()->log('Evoked a delete STK Transaction Request');
        $id = $request->id;
        DB::table('lnmo_api_response')->where('id',$id)->delete();
        return response()->json(['success'=>'Deleted Successfully!']);
    }

    public function deleteBalAjax(Request $request){
        activity()->log('Evoked a delete Balance Transaction Request');
        $id = $request->id;
        DB::table('accountbalance')->where('id',$id)->delete();
        return response()->json(['success'=>'Deleted Successfully!']);
    }

    public function deleteB2CAjax(Request $request){
        activity()->log('Evoked a delete B2C Transaction Request');
        $id = $request->id;
        DB::table('b2c_api_response')->where('id',$id)->delete();
        return response()->json(['success'=>'Deleted Successfully!']);
    }

    public function deleteB2BAjax(Request $request){
        activity()->log('Evoked a delete B2B Transaction Request');
        $id = $request->id;
        DB::table('b2b_api_response')->where('id',$id)->delete();
        return response()->json(['success'=>'Deleted Successfully!']);
    }

    public function deleteC2BAjax(Request $request){
        activity()->log('Evoked a delete C2B Transaction Request');
        $id = $request->id;
        DB::table('mobile_payments')->where('id',$id)->delete();
        return response()->json(['success'=>'Deleted Successfully!']);
    }

    public function deleteUserAjax(Request $request){
        activity()->log('Evoked a delete User Request');
        $id = $request->id;
        DB::table('users')->where('id',$id)->delete();
        return response()->json(['success'=>'Deleted Successfully!']);
    }

    public function deleteFaqAjax(Request $request){
        activity()->log('Evoked a delete FAQ Request');
        $id = $request->id;
        DB::table('faq')->where('id',$id)->delete();
        return response()->json(['success'=>'Deleted Successfully!']);
    }

    public function deletePrivacyAjax(Request $request){
        activity()->log('Evoked a delete Privacy Request');
        $id = $request->id;
        DB::table('privacies')->where('id',$id)->delete();
        return response()->json(['success'=>'Deleted Successfully!']);
    }

    public function deleteTermsAjax(Request $request){
        activity()->log('Evoked a delete Privacy Request');
        $id = $request->id;
        DB::table('terms')->where('id',$id)->delete();
        return response()->json(['success'=>'Deleted Successfully!']);
    }

    public function deleteHowAjax(Request $request){
        activity()->log('Evoked a delete How it works Request');
        $id = $request->id;
        DB::table('hows')->where('id',$id)->delete();
        return response()->json(['success'=>'Deleted Successfully!']);
    }


    public function deleteCoursesAjax(Request $request){
        activity()->log('Evoked a delete How it works Request');
        $id = $request->id;
        DB::table('courses')->where('id',$id)->delete();
        return response()->json(['success'=>'Deleted Successfully!']);
    }


    public function deleteTopicsAjax(Request $request){
        activity()->log('Evoked a delete How it works Request');
        $id = $request->id;
        DB::table('topics')->where('id',$id)->delete();
        return response()->json(['success'=>'Deleted Successfully!']);
    }

    public function deleteSignalsAjax(Request $request){
        activity()->log('Evoked a delete How it works Request');
        $id = $request->id;
        DB::table('signals')->where('id',$id)->delete();
        return response()->json(['success'=>'Deleted Successfully!']);
    }

    public function deleteProductAjax(Request $request){
        activity()->log('Evoked a delete How it works Request');
        $id = $request->id;
        DB::table('products')->where('id',$id)->delete();
        return response()->json(['success'=>'Deleted Successfully!']);
    }


    public function updateSiteSettingsAjax(Request $request){
        activity()->log('Evoked an update Settings Request');
        if($request->tawkToStatus == 'on'){
           $newTawkToSTatus = 1;
        }else{
            $newTawkToSTatus = 0;
        }
        if($request->whatsAppStatus == 'on'){
            $newwhatsAppStatus = 1;
         }else{
             $newwhatsAppStatus = 0;
         }


        $updateDetails = array (
            'sitename' => $request->sitename,
            'whatsAppStatus' => $newwhatsAppStatus,
            'tawkToStatus' => $newTawkToSTatus,
            'tawkTo' => $request->tawkTo,
            'email'=>$request->email,
            'email_one'=>$request->email_one,
            'mobile_one'=>$request->mobile_one,
            'mobile_two'=>$request->mobile_two,
            'mpesa'=>$request->mpesa,
            'paypal'=>$request->paypal,
            'tagline'=>$request->tagline,
            'url'=>$request->url,
            'location'=>$request->location,
            'map'=>$request->map,
            'address'=>$request->address,
            'welcome'=>$request->welcome
        );

        DB::table('_site_settings')->update($updateDetails);
        Session::flash('message', "Changes have Been Saved");
        return response()->json(['success'=>'Changes Saved Successfully!']);
    }

    public function updateMailerAjax(Request $request){
        activity()->log('Evoked a update Mailer Request');

        $updateDetails = array (
            'email' => $request->email,
            'title'=>$request->title,
            'site_title'=>$request->site_title,
            'driver'=>$request->driver,
            'host'=>$request->host,
            'port'=>$request->port,
            'username'=>$request->username,
            'password'=>$request->password,
            'encryption'=>$request->encryption,
            'location'=>$request->location,

        );

        DB::table('email_settings')->update($updateDetails);
        Session::flash('message', "Changes have Been Saved");
        return response()->json(['success'=>'Changes Saved Successfully!']);
    }

    public function updateSiteSocialMediaAjax(Request $request){
        activity()->log('Evoked an update Social Media  Request');
        $updateDetails = array (
            'facebook'=>$request->facebook,
            'twitter'=>$request->twitter,
            'linkedin'=>$request->linkedin,
            'instagram'=>$request->instagram,
            'youtube'=>$request->youtube,
            'google'=>$request->google,
        );

        DB::table('site_settings')->update($updateDetails);
        Session::flash('message', "Changes have Been Saved");
        return Redirect::back();
    }

    public function updateSiteCredentials(Request $request){
        activity()->log('Evoked update credentials Request');
        $updateDetails = array (
            'paypal_secret'=>$request->facebook,
            'paypal_key'=>$request->twitter,
            'paypal_status'=>$request->linkedin,
            'mpesa_secret'=>$request->facebook,
            'mpesa_key'=>$request->twitter,
            'paybill'=>$request->linkedin,
            'initiator'=>$request->facebook,
            'c2bcallback'=>$request->twitter,
            'b2bcallback'=>$request->linkedin,
        );

        DB::table('site_settings')->update($updateDetails);
        Session::flash('message', "Changes have Been Saved");
        return Redirect::back();
    }

    public function updateSlung(){
        $Topic = DB::table('topics')->get();
        foreach($Topic as $Topic){
            $updateDetails = array(
                'slung' => Str::slug($Topic->title),
            );
        }
        return "Done";
    }

    public function addProductToFacebookPixel(){
        ProExcel::truncate();
        // $Products = Product::whereNotNull('fb_pixels');
        $Products = DB::table('products')->whereNotNull('sku')->whereNotNull('image_one')->get();

        foreach($Products as $ProAdd){

                $ProductUrl = "https://royaltech.co.ke/e-commerce/product/$ProAdd->slung";
                $ImageURL = "https://royaltech.co.ke/uploads/products/$ProAdd->image_one";
                $ProExcel  = new ProExcel;
                $ProExcel->code = $ProAdd->sku;
                $ProExcel->google_product_category = $ProAdd->google_product_category;
                $ProExcel->title = $ProAdd->name;
                $ProExcel->description = $ProAdd->meta;
                $ProExcel->availability = $ProAdd->stock;
                $ProExcel->condition = "new";
                $ProExcel->price = "$ProAdd->price KES";
                // $ProExcel->price = $ProAdd->price.".00 KES";
                $ProExcel->link = $ProductUrl;
                $ProExcel->image_link = $ImageURL;
                $ProExcel->brand = $ProAdd->brand;
                $ProExcel->save();
        }
        return redirect()->route('exporting');
    }


    public function emptyProductToFacebookPixel(){
        DB::table('_pro_excel')->delete();
        Session::flash('message', "Table Has been cleared");
        return Redirect::back();
    }

}


