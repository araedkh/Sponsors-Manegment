<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Auth;
use Redirect;
use Session;
use Validator;
use App\Sponsor;
use App\CoSoponsor;
use DB;


class MainController extends Controller
{

	public function homapage(){
		return view('mainpage');
	}

	// ** Login Route **

	public function login(Request $request) {
		$rules = array (
			'username' => 'required',
			'password' => 'required' 
		);

		$validator = Validator::make ( $request->all(), $rules );
		if ($validator->fails ()) {
			return Redirect::back ()->withErrors ( $validator, 'login' )->withInput ();
		} else {
			if (Auth::attempt ( array (

				    'name' => $request->get ( 'username' ),
					'password' => $request->get ( 'password' ) 
			) )) {
				session ( [ 
						
						'name' => $request->get ( 'username' ) 
				] );
				return Redirect::back ();
			} else {
				Session::flash ( 'message', "Invalid Credentials , Please try again." );
				return Redirect::back ();
			}
		}
	}


	// ** Register Route **
	public function register(Request $request) {
		$rules = array (
				'email' => 'required|unique:users|email',
				'name' => 'required|unique:users|alpha_num|min:4',
				'password' => 'required|min:6|confirmed' 
		);

		$validator = Validator::make ( $request->all(), $rules );
		if ($validator->fails ()) {
			return Redirect::back ()->withErrors ( $validator, 'register' )->withInput ();
		} else {
			$user = new User ();
			$user->name = $request->get ( 'name' );
			$user->email = $request->get ( 'email' );
			$user->password = Hash::make ( $request->get ( 'password' ) );
			$user->remember_token = $request->get ( '_token' );
			
			$user->save ();
			return Redirect::back ();
		}
	}

	// ** Logout Route **
		public function logout() {
		Session::flush ();
		Auth::logout ();
		return Redirect::back ();
	}

	
	// ** Add New Personal Sponsor Route **



	public function newPersonalSponsor(Request $request){
          $sponsors = Sponsor::all();

    	 return view('/newPersonalSponsor',compact('sponsors'));

    	$spn = new Sponsor;
    	$spn->IdCard = $request->input('IdCard');
    	$spn->IdCardNumber = $request->input('IdCardNumber');
    	$spn->FullName = $request->input('FullName');
    	$spn->Gov = $request->input('Gov');
    	$spn->City = $request->input('City');
    	$spn->Dist = $request->input('Dist');
    	$spn->AddressDetails = $request->input('AddressDetails');
    	$spn->Tel = $request->input('Tel');
    	$spn->Mobile = $request->input('Mobile');
    	$spn->Email = $request->input('Email');
    	$spn->Nationality = $request->input('Nationality');
    	$spn->Country = $request->input('Country');

  		$spn->save();

  		$sponsors = Sponsor::all();
        
        return view('/newPersonalSponsor',compact('sponsors'));

        return back()->with('success', 'Added successfully.');

    }
 
  	

  	// ** Add New Corporation Sponsor Route **

	public function newCorporationSponsor(Request $req){

		$Cosponsors = CoSoponsor::all();

    	return view('/newCorporationSponsor',compact('Cosponsors'));

    	$co_spn = new CoSponsor;
    	$co_spn->Country = $req->input('Country');
    	$co_spn->FullName = $req->input('FullName');
    	$co_spn->ContactPerson = $req->input('ContactPerson');
    	$co_spn->Address = $req->input('Address');
    	$co_spn->FirstTel = $req->input('FirstTel');
    	$co_spn->SecondTel = $req->input('SecondTel');
    	$co_spn->Email = $req->input('Email');
    	

  		$co_spn->save();

  		$Cosponsors = CoSoponsor::all();
        
        return view('/newCorporationSponsor',compact('Cosponsors'));

        return back()->with('success', 'Added successfully.');
 
  	}


  	// ** Search About Sponsor **

  	 public function Search(Request $reqest){

  	 	return view('my-search');
    
    	if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('sponsors')
         ->where('IdCard', 'like', '%'.$query.'%')
         ->orWhere('IdCardNumber', 'like', '%'.$query.'%')
         ->orWhere('FullName', 'like', '%'.$query.'%')
         ->orWhere('Gov', 'like', '%'.$query.'%')
         ->orWhere('City', 'like', '%'.$query.'%')
         ->orWhere('Dist', 'like', '%'.$query.'%')
         ->orWhere('AddressDetails', 'like', '%'.$query.'%')
         ->orWhere('Tel', 'like', '%'.$query.'%')
         ->orWhere('Mobile', 'like', '%'.$query.'%')
         ->orWhere('Email', 'like', '%'.$query.'%')
         ->orWhere('Nationality', 'like', '%'.$query.'%')
         ->orWhere('Country', 'like', '%'.$query.'%')
         
         ->orderBy('id', 'desc')
         ->get();
         
      }
      else
      {
       $data = DB::table('sponsors')
         ->orderBy('id', 'desc')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->Name.'</td>
         <td>'.$row->Type.'</td>
         <td>'.$row->Country.'</td>
         <td>'.$row->Address.'</td>
         <td>'.$row->Telephone.'</td>
         <td>'.$row->Beneficaires.'</td>
         <td>'.$row->Process.'</td>
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }

    // *** List All Sponsor Route **

    public function list()
    {
        $sponsors = Sponsor::all();
        $cosponsors = CoSoponsor::all();

        return view('showsponsors');
    }

    // *** Edit Sponsor Route ***

    public function edit($id)
    {
        $spon = Sponsor::find($id);
        return view('editSponsor', compact('spon'));        
    }

     public function update(Request $request, $id)
    {
        $request->validate([
            'IdCardNumber'=>'required',
            'FullName'=>'required',
            'Email'=>'required'
        ]);

        $spon = Sponsor::find($id);
        $spon->IdCard =  $request->get('IdCard');
        $spon->IdCardNumber = $request->get('IdCardNumber');
        $spon->FullName = $request->get('FullName');
        $spon->Gov = $request->get('Gov');
        $spon->City = $request->get('City');
        $spon->Dist = $request->get('Dist');
        $spon->AddressDetails =  $request->get('AddressDetails');
        $spon->Tel = $request->get('Tel');
        $spon->Mobile = $request->get('Mobile');
        $spon->Email = $request->get('Email');
        $spon->Nationality = $request->get('Nationality');
        $spon->Country = $request->get('Country');
        $spon->save();

        return view('editSponsor', compact('spon'))->with('success', 'Contact updated!');
    }

    // *** Delete Sponsor Route ***

     public function destroy($id)
    {
        $spon = Sponsor::find($id);
        $spon->delete();

        return view('showsponsors')->with('success', 'Contact deleted!');
    }

    





    
}
