<div class="container mt-2">
    <!-- CandidateMission/applyJob/ -->
    <b style="font-size:18px;" class="mb-5">All applications are treated in the strictest confidence.</b><br>

    <h3 class="text-warning ml-0 my-3">Personal Information</h3>
    <hr />
    <div class="col-12">

        <div class="row">

            <div class="col-md-4 pr-md-3 p-0">
                <label for="firstNameID" class="font-weight-bold"><span class="text-danger">* </span>First Name:</label>
                <input type="text" class="form-control" @change="checkFirstName" placeholder="Enter firstName" name="firstName" id="firstNameID"
                 v-model="firstName" />
                <div class="row mt-3 mx-3" v-if="firstNameError.length">
                    <p class="text-danger" v-text="firstNameError"></p>
                </div>
            </div>
            <div class="col-md-4 pr-md-0 p-0 pt-3 pt-md-0">
                <label for="lastNameID" class="font-weight-bold"><span class="text-danger">* </span>Last Name:</label>
                <input type="text" placeholder="Enter lastName" @change="checkLastName" class="form-control" name="lastName" id="lastNameID"
                 v-model="lastName" />
                <div class="row mt-3 mx-3" v-if="lastNameError.length">
                    <p class="text-danger" v-text="lastNameError"></p>
                </div>
            </div>
        </div>
        <div class="row mt-md-3">
            
            <div class="col-md-4 pr-md-3 p-0 pt-3 pt-md-0">
                <label for="emailID" class="font-weight-bold"><span class="text-danger">* </span>Email:</label>
                <input type="email" class="form-control" placeholder="Enter email" @change="checkEmail" name="email" id="emailID" v-model="userEmail"/>
                <div class="row mt-3 mx-3" v-if="emailError.length">
                    <p class="text-danger" v-text="emailError"></p>
                </div>
            </div>
            <div class="col-md-4 pr-md-0 p-0 mt-2 mt-md-0">
                <label for="PhoneNumberID" class="font-weight-bold">Phone Number:</label>
                <input type="text" placeholder="Enter PhoneNumber" @change="checkPhoneNumber" class="form-control" name="PhoneNumber"
                    id="PhoneNumberID" v-model="phoneNumber"/>
                <div class="row mt-3 mx-3" v-if="phoneNumberError.length">
                    <p class="text-danger" v-text="phoneNumberError"></p>
                </div>
            </div>
            
          
                
        </div>
       
        <div class="row mt-md-3">
            <div class="col-lg-4 col-md-11 pr-md-3 p-0 mt-2 mt-md-0">
                <label for="AddressID" class="font-weight-bold"><span class="text-danger">* </span>Address and street number:</label>
                <input type="text" placeholder="Enter Address" @change="checkAddress" class="form-control" name="Address" id="AddressID"
                 v-model="userAddress" />
                <div class="row mt-3 mx-3" v-if="addressError.length">
                    <p class="text-danger" v-text="addressError"></p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-9 p-0 mt-2 mt-lg-0 mt-md-2 pr-2">
                <label for="CityID" class="font-weight-bold"><span class="text-danger">* </span>City:</label>
                <select class="form-control" type="text" @change="checkCity" name="City" id="CityID" v-model="city" >
                    <option selected></option>
                    <?php foreach($cities as $city): ?>
                    <option value="<?php echo $city['CityName']; ?>"><?php echo $city['CityName']; ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="row mt-3 mx-3" v-if="cityError.length">
                    <p class="text-danger" v-text="cityError"></p>
                </div>
            </div>
            <div class="col-lg-1 col-md-3 pr-md-0 p-0 mt-2 mt-lg-0 mt-md-2 col-3">
                <label for="ZipCodeID" class="font-weight-bold">ZipCode</label>
                <input type="text" placeholder="ZIP" class="form-control" @change="checkZip" name="ZipCode" id="ZipCodeID" v-model="zipCode"/>
                <div class="row mt-3 mx-3" v-if="zipCodeError.length">
                    <p class="text-danger" v-text="zipCodeError"></p>
                </div>
            </div>
            <div class="col-md-4 px-md-3 p-0 mt-2 mt-lg-0 mt-md-2">
                <label for="SuburbID" class="font-weight-bold">Suburb:</label>
                <input type="text" placeholder="Enter Suburb" class="form-control" @change="checkSuburb" name="Suburb" id="SuburbID" v-model="suburb" />
                <div class="row mt-3 mx-3" v-if="suburbError.length">
                    <p class="text-danger" v-text="suburbError"></p>
                </div>
            </div>
        </div>
        
        <div class="row mt-md-3">
            <div class="col-md-4 pr-md-3 p-0">
                    <label for="DOBID" class="font-weight-bold"><span class="text-danger"></span>Date of Birth:</label>
                    <input type="date" placeholder="YYYY-MM-DD" class="form-control" v-model="DOB" name="DOB" id="DOBID">
            </div>
            <div class="col-md-6 p-0 pt-3 pt-md-0">
                <div class="row mx-1">
                    <label for="SexID" class="font-weight-bold">Sex:</label>
                </div>
                <div class="row">
                    <div class="col-4 col-md-5">
                        <input type="radio" name="gender"
                            <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female"
                            checked v-model="gender">Female</div>
                    <div class="col">
                        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?>
                            value="male" v-model="gender">Male</div>
                </div>
            </div>
                
        </div>
        

    </div>
        <h3 class="text-warning mt-3"> Profession </h3>
        <hr />
        
        <div class="row">
            
            <div class="col-md-4">
                <label for="jobInterestID" class="font-weight-bold">Job interested in:</label>
                <input type="text" class="form-control" v-model="jobInterest" @change="checkGeneral('jobInterest')" name="jobInterest" placeholder="interest" id="jobInterestID" />
                <div class="row mt-3 mx-3">
                    <p id="jobInterestIDError" class="text-danger"></p>
                </div>
            </div>
            <div class="col-md-3 px-3 mt-2 mt-md-0">
                <label for="jobTypeID" class="font-weight-bold">Job Type:</label>
                <select class="form-control p-2" type="text"  v-model="jobType" name="jobType" id="jobTypeID">
                    <option selected></option>
                    <option value="FullTime">Full Time</option>
                    <option value="PartTime">Part Time</option>
                </select>
            </div>
            <div class="col-md-5 mt-2 mt-md-0">
                <div class="row">
                <label for="JobCVID" class="font-weight-bold mx-3">Drop your CV here:</label>
                </div>
                <div class="row">
                <input type="file" class="col-10" id="JobCVID" @change="checkJobCV" name="jobCV">
                <div class="mt-3" v-if="jobCVError.length">
                    <p class="text-danger" v-text="jobCVError"></p>
                </div>
                </div>
            </div>
        </div>
        <h3 class="text-warning mt-3"> Transportation </h3>
        <hr />
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <label for="transportationID" class="font-weight-bold">Transportation to work:</label>
                <input type="text" class="form-control" @change="checkGeneral('transportation')" v-model="transportation" name="transportation" placeholder="Enter Transportation"
                    id="transportationID">
            <div class="row mt-3 mx-3">
                <p id="transportationIDError" class="text-danger"></p>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <label for="licenseNumberID" class="font-weight-bold mt-2">NZ License Number:</label>
                <input type="text" class="form-control" v-model="licenseNumber" @change="checkGeneral('licenseNumber')" name="LicenseNumber" placeholder="NZ License Number"
                    id="licenseNumberID">
                <div class="row mt-3 mx-3">
                    <p id="licenseNumberIDError" class="text-danger"></p>
                </div>
            </div>
            <div class="col-lg-4 col-md-5">
                <label for="classLicenseID" class="font-weight-bold mt-2">Class of license:</label>
                <select class="form-control" id="classLicenseID" v-model="classLicense" name="classLicense" >
                    <option value="" selected></option>
                    <option value="Class1 Learner">Class 1 - Car license (Learner or Restricted) </option>
                    <option value="Class1 Restricted">Class 1 - Car license (Restricted) </option>
                    <option value="Class1 Full">Class 1 - Car license (Full) </option>
                    <option value="Class2 MediumRigidVehicleLearner">Class 2 - Medium rigid vehicle (Learner or Restricted) </option>
                    <option value="Class2 MediumRigidVehicleFull">Class 2 - Medium rigid vehicle (Full) </option>
                    <option value="Class3 MediumCombination">Class 3 - Medium combination (Learner or Full) </option>
                    <option value="Class4 HeavyRigid">Class 4 - Heavy rigid (Learner or Full) </option>
                    <option value="Class5 HeavyCombination">Class 5 - Heavy combination (Learner or Full) </option>
                    <option value="Class6 Motorcycle">Class 6 - Motorcycle license </option>
                </select>
            </div>
            <div class="col-md-6 col-lg-4">
                <label for="endorsementID" class="font-weight-bold mt-2">Endorsements:</label>
                <input type="text" class="form-control" @change="checkGeneral('endorsement')" v-model="endorsement" placeholder="Endorsement" name="endorsement" id="endorsementID">
                <div class="row mt-3 mx-3">
                    <p id="endorsementIDError" class="text-danger"></p>
                </div>
            </div>
        </div>
        <h3 class="text-warning mt-3">Citizenship</h3>
        <hr />
        <div class="row">

            <div class="col-lg-3 col-md-6">
                <label for="citizenshipID" class="font-weight-bold"> Citizenship:</label>
                <select class="form-control" id="citizenshipID" v-model="citizenship" name="citizenship" required>
                    <option value="" selected></option>
                    <?php foreach($citizenships as $citizenship): ?>
                    <option value="<?php echo $citizenship['Citizenship']; ?>"><?php echo $citizenship['Citizenship']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-lg-3 col-md-5 pr-md-0">
                <label for="nationalityID" class="font-weight-bold"> Nationality:</label>
                <input type="text" class="form-control" @change="checkGeneral('nationality')" v-model="nationality" placeholder="Enter Nationality" name="nationality"
                    id="nationalityID" />
                <div class="row mt-3 mx-3">
                    <p id="nationalityIDError" class="text-danger"></p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <label for="passportCountryID" class="font-weight-bold">Passport issuing country:</label>
                <input type="text" class="form-control" v-model="passportCountry" @change="checkGeneral('passportCountry')" placeholder="Passport Issuing Country" name="passportCountry"
                    id="passportCountryID" />
                <div class="row mt-3 mx-3">
                    <p id="passportCountryIDError" class="text-danger"></p>
                </div>
            </div>
            <div class="col-lg-3 col-md-5 pr-md-0">
                <label for="passportNumberID" class="font-weight-bold">Passport Number:</label>
                <input type="text" class="form-control" v-model="passportNumber" @change="checkGeneral('passportNumber')" placeholder="Passport Number" name="passportNumber"
                    id="passportNumberID" />
                <div class="row mt-3 mx-3">
                    <p id="passportNumberIDError" class="text-danger"></p>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-4 col-md-6">
                <label for="workPermitNumberID" class="font-weight-bold">Work permit number:</label>
                <input type="text" class="form-control" v-model="workPermitNumber" @change="checkGeneral('workPermitNumber')" placeholder="Work Permit Number" name="workPermitNumber"
                    id="workPermitNumberID" />
                <div class="row mt-3 mx-3">
                    <p id="workPermitNumberIDError" class="text-danger"></p>
                </div>
            </div>
            <div class="col-lg-4 col-md-5 pr-md-0">
                <label for="workPermitExpiryID" class="font-weight-bold">Work permit expiry date:</label>
                <input type="date" class="form-control" @change="checkDate('workPermitExpiry')" v-model="workPermitExpiry" placeholder="Work Permit Expiry Date" name="workPermitExpiry"
                    id="workPermitExpiryID" />
                <div class="row mt-3 mx-3">
                    <p id="workPermitExpiryIDError" class="text-danger"></p>
                </div>
            </div>
        </div>
        <h3 class="text-warning mt-3">Health</h3>
        <hr />
        <small>Check the box if you have these conditions<br></small>
        <div class="container p-0 m-0">
            <div class="row">
                <div class="col-md-9">
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <input type="checkbox" class="form-check-inline" v-model="asthma" name="asthma">Asthma
                        </div>
                        <div class="col-md-4">
                            <input type="checkbox" class="form-check-inline" v-model="blackOut" name="blackOut">BlackOut / Seizures
                        </div>
                        <div class="col-md-4">
                            <input type="checkbox" class="form-check-inline" v-model="diabetes" name="diabetes">Diabetes
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <input type="checkbox" class="form-check-inline" v-model="bronchitis" name="bronchitis">Bronchitis
                        </div>
                        <div class="col-md-4">
                            <input type="checkbox" class="form-check-inline" v-model="backInjury" name="backInjury">Back Injury / strain

                        </div>
                        <div class="col-md-4">
                            <input type="checkbox" class="form-check-inline" v-model="deafness" name="deafness">Deafness
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <input type="checkbox" class="form-check-inline" v-model="dermatitis" name="dermatitis">Dermatitis / Eczema
                        </div>
                        <div class="col-md-4">
                            <input type="checkbox" class="form-check-inline" v-model="skinInfection" name="skinInfection">Skin infection
                        </div>
                        <div class="col-md-4">
                            <input type="checkbox" class="form-check-inline" v-model="allergies" name="allergies">Allergies
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <input type="checkbox" class="form-check-inline" v-model="hernia" name="hernia">Hernia
                        </div>
                        <div class="col-md-4">
                            <input type="checkbox" class="form-check-inline" v-model="highBloodPressure" name="highBloodPressure">High blood
                            pressure
                        </div>
                        <div class="col-md-4">
                            <input type="checkbox" class="form-check-inline" v-model="heartProblems" name="heartProblems">Heart Problems
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <input type="checkbox" class="form-check-inline" v-model="usingDrugs" name="usingDrugs">taking Drugs / Medicine

                        </div>
                        <div class="col-md-4">
                            <input type="checkbox" class="form-check-inline" v-model="usingContactLenses" name="usingContactLenses">Wearing contact
                            lenses / glasses

                        </div>
                        <div class="col-md-4">
                            <input type="checkbox" class="form-check-inline" v-model="RSI" name="RSI">Occupational Overuse Syndrome /
                            R.S.I

                        </div>
                    </div>
                </div>
                <div class="col-md-3 pt-3 pt-md-0">
                    <div class="row">
                        <label for="compensationInjuryID" class="font-weight-bold">Compensation of any injury by
                            ACC</label>
                        <select class="form-control p-2" type="text" v-model="compensationInjury" name="compensationInjury"
                            id="compensationInjuryID">
                            <option selected>-</option>
                            <option value="No">No</option>
                            <option value="Yes">Yes</option>
                        </select>
                    </div>
                    <div class="row mt-2">
                        <label for="compensationDateFromID" class="font-weight-bold">Dates From</label>
                        <input type="date" v-model="compensationDateFrom" @change="checkCompensationDate" name="compensationDateFrom" id="compensationDateFromID" class="form-control">


                        <label for="compensationDateToID" class="font-weight-bold mt-2">Dates To</label>
                        <input type="date" v-model="compensationDateTo" @change="checkCompensationDate" name="compensationDateTo" id="compensationDateToID" class="form-control">
                        <div class="row mt-3 mx-3" v-if="compensationError.length>0">
                            <p v-text="compensationError"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h3 class="text-warning mt-3">Other Details</h3>
        <hr />
        <div class="container">
            <input type="checkbox" class="form-check-inline" v-model="dependants" name="dependants"> Having dependants <br>

            <input type="checkbox" class="form-check-inline" v-model="smoke" name="smoke"> Do you smoke?<br>

            <input type="checkbox" class="form-check-inline" v-model="conviction" name="conviction"> Having conviction against the law?<br>
            <label for="convictionDetailsID" class="mt-3">Details if <b>"yes"</b> </label>
            <textarea class="form-control rounded-0" id="convictionDetailsID" @change="checkGeneral('convictionDetails')" rows="2"
            v-model="convictionDetails"  name="convictionDetails"></textarea>
            <div class="row mt-3 mx-3">
                <p id="convictionDetailsIDError" class="text-danger"></p>
            </div>
        </div>
        <h3 class="text-warning mt-3">Declaration and Authorisation To Lee Recruitment</h3>
        <hr />
        <div class="container font-weight-bold" style="overflow-y:scroll; height:400px;">
            <p>I CERTIFY that all information that I have provided to you is true, accurate and complete. </p>
            <p>
                I UNDERSTAND that all information provided about me to you will be held by you and used for the purpose
                of evaluating my qualifications, experience and suitability for permanent and /or temporary employment
                with you or with any other employer.
            </p>
            <p>I AUTHORISE you to contact any person and seek further information from them which may be relevant to my
                application for employment. Without limiting the generality of this authorisation, I authorise you to
                obtain any information about me held by credit reference agencies.
            </p>
            <p>I UNDERSTAND that if I, or if any other person, withholds relevant information about me, my application
                may not be further considered. I also understand that my employment may be terminated if, after
                investigation, an employer discovers that any information which I have provided, or which has been
                provided about me is false or misleading.</p>
            <p>I AUTHORISE you to retain any information about me until I advise you that I no longer wish to seek
                employment opportunities through you. I understand that you might retain non-active information about me
                on your system. </p>

        </div>
        <input type="checkbox" v-model="confirm" class="form-check-inline ml-md-1 mt-3" required> Please tick this box to confirm the
        above statements.<br>
        
        <div class="mt-3 row col-12">
            <button class="btn btn-warning" :disabled="allGood()" @click="submitJob">Register</button>
            <div class="mx-md-3 mt-2" v-if="emptyRequiredError.length">
            <span class="text-danger" v-text="emptyRequiredError"></span>
            </div>
        </div>
</div>