@extends('justnpot.customer-main')
@section('title', 'Registration')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>

<style>

</style>
<div class="container" style="margin-top: 150px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">

                        @csrf

                        <div class="row mb-3">
                            <label for="type" class="col-md-4 col-form-label text-md-end">{{ __('User Type') }}</label>

                            <div class="col-md-6">

                                <select class="form-select @error('type') is-invalid @enderror" aria-label="Default select example" name="type" id="type" required value="{{ old('type') }}" required autocomplete="type" autofocus>
                                    <option class="opt1" value="" disabled selected hidden>Select User Type</option>
                                    <option value="0">Customer</option>
                                    <option value="2">Member</option>
                                 </select>
                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                            
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="email" class="col-form-label text-md-end">(Will be used for paypal transactions)</label>
                            </div>
                        </div>



                        <div class="row mb-3">
                            <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="mobile" class="col-md-4 col-form-label text-md-end">{{ __('Contact No.') }}</label>
                     
                            <div class="col-md-6">
                                <input id="mobile" type="text"     oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}"  minlength="11" maxlength="11" required autocomplete="mobile" autofocus>

                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                                <select class="form-select" aria-label="Default select example" name="gender" id="gender" >
                                    <option class="opt1" value="" disabled selected hidden>Select Gender</option>
                                    <option value="0" > Male</option>
                                    <option value="1" > Female</option>

                                 </select>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="age" class="col-md-4 col-form-label text-md-end">{{ __('Age') }}</label>

                            <div class="col-md-6">
                                <input id="age" type="number" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" required autocomplete="age" autofocus>

                                @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="birthdate" class="col-md-4 col-form-label text-md-end">{{ __('Birthdate') }}</label>

                            <div class="col-md-6">
                                <input id="birthdate" type="date" class="form-control @error('birthdate') is-invalid @enderror" name="birthdate" value="{{ old('birthdate') }}" required autocomplete="birthdate" autofocus>

                                @error('birthdate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>





                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('ID Image') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" required autocomplete="image" autofocus>

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Profile Picture ') }}</label>

                            <div class="col-md-6">
                                <input id="picture" type="file" class="form-control @error('picture') is-invalid @enderror" name="picture" value="{{ old('picture') }}" required autocomplete="picture" autofocus>

                                @error('picture')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">

                            <div class="col-md-4">

                            </div>
                            <div class="col-md-8 " style="font-size:16px !important;
                            border: 2px solid rgb(112, 112, 112);

                            border-radius: 10px; text-align:left; background-color:rgb(198, 255, 198) ">

Note: Password must contain this<br> <br>
• Must be at least 8 characters in length <br>
• Must contain at least one lowercase letter<br>
• Must contain at least one uppercase letter<br>
• Must contain at least one digit <br>
• Must contain a special character

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                          <label class="col-md-4 col-form-label text-md-end">{{ __('I Agree to Artisan Hub Privacy Policy') }}</label>
 <div class="col-md-6">
                                <input id="agreeCheckbox" type="checkbox" class="form-check-input" name="agreeCheckbox" required>
                            </div>
                        </div>



                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalScrollableTitle">Terms and Condition</h5>

        </div>
        <div class="modal-body">
          <h1>  Privacy Policy</h1><br>
ArtisanHub  values and respects your right to privacy. We are committed to protect the privacy of our website visitors. We will only collect, record, store, process, and use your personal information in accordance with the Data Privacy Act of 2012, its Implementing Rules and Regulations, the issuances by the National Privacy Commission, and other pertinent laws.

This Privacy Policy informs you of updates in our corporate policies regarding the collection, use, storage, disclosure, and disposal of personal information we receive and collect from our customers, and any individual who communicates, raises inquiries and concerns, as well as transacts with us through our authorized representatives.

We will only use your data based on th.
e limitations set by this policy. The outline below provides the manner by which we manage the personal information that we will obtain from you if you visit our website.

Personal Information
Personal Information refers to any information, whether recorded in a material form or not, from which the identity of an individual is apparent or can be reasonably and directly ascertained by the entity holding the information, or when put together with other information would directly and certainly identify an individual. Sensitive Personal Information is any attribute of your personal information that can discriminate, qualify, or classify you such as your age, date of birth, marital status, government-issued identification numbers, account numbers, and financial information. Privileged Information is any and all forms of information which, under the Rules of Court and other pertinent laws, constitute privileged communication.
<br><br>
Under the Data Privacy Act of 2012, you have the following rights:
<br><br>
1.) Right to be informed – you may request the details as to how your personal information is being processed or have been processed by the Company, including the existence of automated decision-making and profiling systems;
<br><br>
2.)Right to access – upon written request, you may demand reasonable access to your personal information, which may include the contents of your processed personal information, the manner of processing, sources where they were obtained, recipients and reason of disclosure;
<br><br>
3.)Right to dispute – you may dispute inaccuracy or error in your personal information in the Company systems through our contact center representatives;
<br><br>
4.)Right to object – you may suspend, withdraw, and remove your personal information in certain further processing, upon demand, which include your right to opt-out to any commercial communication or advertising purposes from the Company;
<br><br>
5.)Right to data erasure – based on reasonable grounds, you have the right to suspend, withdraw or order the blocking, removal or destruction of your personal data from the Company’s filing system;
<br><br>
6.)Right to secure data portability – you have the right to obtain from the Company your personal information in an electronic or structured format that is commonly used and allows for further use;
<br><br>
7.)Right to be indemnified for damages – as data subject, you have every right to be indemnified for any damages sustained due to such violation of your right to privacy through inaccurate, false, unlawfully obtained or unauthorized use of your information; and
<br><br>
8.)Right to file a complaint – you may file your complaint or any concerns with our legal compliance division: legalcompliance@incorp.ph
        </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
            </form>
        </div>
      </div>
    </div>
  </div>

<br><br><br>
<script>
    $('input[type="checkbox"]').on('change', function(e){
   if(e.target.checked){
     $('#exampleModalScrollable').modal();
     console.log("asd");
   }
});
</script>

@endsection
