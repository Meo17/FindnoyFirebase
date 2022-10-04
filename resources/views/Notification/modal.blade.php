<!-- =========== ===== MODAL Alert =================================================-->
  <div class="modal fade" id="verticalycentered-1" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <form method="post" action="{{url('p_deactivate')}}">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">DISABLE STATION</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Do you want to deactivate this station?
                <input type="hidden" name="id" id="bookId" value=""/>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">Proceed</button>
            </div>
          </div>      
        </form>
      </div>
  </div>
<!--======================== Station ============================================-->
  <!-- End Table with stripped rows -->
  <div class="modal fade" id="verticalycentered1" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <form method="post" action="{{url('p_activate')}}">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Account Activation</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Do you want to activate this account?
                <input type="hidden" name="id" id="bookId" value=""/>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">Proceed</button>
            </div>
          </div>      
        </form>
      </div>
  </div>
<!--====================== Police Officer Modal  ==================================-->
  <!-- End Table with stripped rows  Super Admin-->
  <div class="modal fade" id="verticalycentered2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <form method="post" action="{{url('police_officer_deactivate')}}">
          <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">DEACTIVATION</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              Do you want to deactivate this account?
              <input type="hidden" name="id" id="bookId" value=""/>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Proceed</button>
          </div>
          </div>      
      </form>
    </div>
  </div>     
  <div class="modal fade" id="verticalycentered3" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
      <form method="post" action="{{url('police_officer_activated')}}">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">ACTIVATION</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Do you want to activate this account?
            <input type="hidden" name="id" id="bookId" value=""/>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Proceed</button>
          </div>
        </div>      
      </form>
    </div>
  </div>  

  <div class="modal fade" id="view_police_offficer" tabindex="-1">
  </div>


  <div class="modal fade" id="updte_police_offficer" tabindex="-1">
  </div>

  <div class="modal fade" id="request_deactivation_officer_modal" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <input type="hidden" name="id" id="id_deactivation" value=""/>
             <div class="modal-header">
                <h5 class="modal-title">Officer Detail</h5>
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
              <div class="modal-body">
              </div>
              <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
          </div>
      </div>  
  </div>


 <!--=================== End Police Officer Modal  ==================================-->


<!--================== View Detail Wanted Criminal Modal ============================-->
  <div class="modal fade" id="viewwantedcriminal" tabindex="-1" >
      <div class="modal-dialog modal-x2">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"> Detail</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

            <div class="spinner_wanted" hidden>
                   <div class="spinner-border" role="status" style="
                  position: absolute;
                  height: 50px;
                  width: 50px;
                  top: 50%;
                  left: 50%;
                  margin-left: -50px;
                  margin-top: -50px;
                  background-size: 100%;
                ">
                <span class="visually-hidden">Loading...</span>
            </div>

              </div>
              <input type="hidden" name="id" id="id_wanted" value=""/>
              <!-- image here  -->
              <div class="detail_w" hidden>
                  <div class="col-sm-2">
                    <img src="{{asset('assets/img/user.png')}}" class="card-img-top" alt="..." id="image_wanted" style="  padding: 10px;  width: 200px; float: left;">
                  </div>

                  <div style="text-align: left; " >
                    <div class="row mb-3"id="vdetail.name_wanted_criminals">
                    <label  class="col-sm-6 col-form-label">Full Name:   </label>
                         <p class="wanted_name"></p>
                    </div>
                    <div class="row mb-3" id="vdetail.address_wanted_criminals">
                      <label  class="col-sm-6 col-form-label"> Aliases: </label>
                            <p class="wanted_alias"></p>
                    </div>
                    <div class="row mb-3" id="vdetail.age_wanted_criminals">
                      <label  class="col-sm-6 col-form-label">Bounty: </label>
                           <p class="wanted_bounty"></p>
                    </div>
                    <div class="row mb-3" id="vdetail.contact_wanted_criminals">
                      <label  class="col-sm-6 col-form-label"> Case :  </label>
                          <p class="wanted_case"></p>
                    </div>
                  </div>         


              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>

          </div>
        </div>
      </div>
    </div>
    <!-- END -->
    <!-- Missing Person -->
  <!-- Edit Modal Wanted Criminal List -->
  <div class="modal fade" id="edit_wanted" tabindex="-1" >
        <div class="modal-dialog modal-x2">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"> Edit Detail
               </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{url('update_criminal')}}"  enctype="multipart/form-data"> 
            <div class="modal-body">
              <div class="spinner_view_wanted" hidden>
                    <div class="spinner-border" role="status" style="
                      position: absolute;
                      height: 50px;
                      width: 50px;
                      top: 50%;
                      left: 50%;
                      margin-left: -50px;
                      margin-top: -50px;
                      background-size: 100%;
                    ">
                    <span class="visually-hidden">Loading...</span>
                  </div>
                </div>
                <input type="hidden" name="id" id="id_edit_wanted" value=""/>
                <!-- image here  -->
              <div class="view_edit_wanted" hidden>
          
                <div class="row mb-3">  
                  <div class="col-sm-4" >
                    <img src="assets/img/user.png" class="card-img-top" alt="..." id="output6" style="  padding: 5px;  width: 300px;">
                    <input onchange="output6(event)" class="form-control" type="file" id="formFile" name="file_image_wanted_criminals" >
                  </div>
                  </div>  
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Firstname: </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="fname_wanted_criminals" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Middle Name: </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="m_wanted_criminals" >
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Surname: </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="lname_wanted_criminals" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Alias/Nickname: </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nickname_wanted_criminals" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Case Number:</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="case_number_wanted_criminals" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Case File:</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="case_file_wanted_criminals" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Tag:</label>
                    <div class="col-sm-10">
                      <select class="form-select" aria-label="Default select example"  name="select_tags_wanted_criminals">
                          <option value="#F00">Red - Actual Threat</option>
                          <option value="#ffa500">Orange - Possible Threat </option>
                          <option value="#FFFF00">Yellow - Aware </option>
                      </select>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Bounty:</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" name="bounty_wanted_criminals" placeholder="bounty is required"required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Police Officer:</label>
                    <div class="col-sm-10">
                       <select class="form-select" aria-label="Default select example"  name="police_officer_wanted_criminals">
                          @if(!empty($field_officers))
                            <option value="" disabled>-</option>
                            @foreach($field_officers as $key => $val)
                              <option value="{{$val['rank_add_field_officers'].' '.$val['fname_add_field_officers'].' '.$val['m_add_field_officers'].' ' .$val['lname_add_field_officers'] }}">{{$val['rank_add_field_officers'].' '.$val['fname_add_field_officers'].' '.$val['m_add_field_officers'].' ' .$val['lname_add_field_officers'] }}</option>
                            @endforeach
                         @endif
                        </select>

                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Date Filed: </label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" name="date_filed_wanted_criminals" required>
                    </div>
                  </div>
                 </div>
                <div class="modal-footer">
                   <button type="submit" class="btn btn-secondary">Update</button>
                   <button type="button" class="btn btn-info" data-bs-dismiss="modal">Cancel</button>
                </div>
              </div>
             </form>
           </div>
         </div>
  </div>
  <!-- Close Case Wanted Criminal  -->
  <div class="modal fade" id="closeCaseWanted" tabindex="-1" >
        <div class="modal-dialog modal-x2">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"> Close Case Wanted
               </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{url('close_case_criminal')}}"> 
              <div class="modal-body">
                   <input type="hidden" name="id" id="id_close_wanted" value=""/>
                   <p>Do you want to close this case ? Please click to proceed </p>
              </div>
              <div class="modal-footer">
                   <button type="submit" class="btn btn-secondary">Procceed</button>
                   <button type="button" class="btn btn-info" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
          </div>
  <!-- View Detail Wanted Criminal Modal -->
<div class="modal fade" id="viewwantedcriminal" tabindex="-1" >
    <div class="modal-dialog modal-xl">
      <div class="modal-content"> 
        <div class="modal-header">
          <h5 class="modal-title"> View Wanted Criminal</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <div class="spinner_wanted" hidden>
                 <div class="spinner-border" role="status" style="
                position: absolute;
                height: 50px;
                width: 50px;
                top: 50%;
                left: 50%;
                margin-left: -50px;
                margin-top: -50px;
                background-size: 100%;
              ">
              <span class="visually-hidden">Loading...</span>
          </div>
            </div>
            <input type="hidden" name="id" id="id_wanted" value=""/>
            <!-- image here  -->
            <div class="detail_w" hidden>
              <div class="row mb-3">
                <div class="col-sm-2">
                 <img src="{{asset('assets/img/user.png')}}" class="card-img-top" alt="..." id="image_wanted" style="  padding: 10px;  width: 200px;">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Firstname: </label>
                <div class="col-sm-10">
                  <p type="text" class="form-control" id="fname_wanted_criminals" name="fname_wanted_criminals" >
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Middle Name: </label>
                <div class="col-sm-10">
                  <p type="text" class="form-control" id="m_wanted_criminals" name="m_wanted_criminals" >
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Surname: </label>
                <div class="col-sm-10">
                  <p type="text" class="form-control" id="lname_wanted_criminals" name="lname_wanted_criminals" >
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Alias/Nickname: </label>
                <div class="col-sm-10">
                  <p type="text" class="form-control"  id="nickname_wanted_criminals" name="nickname_wanted_criminals" >
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Case Number:</label>
                <div class="col-sm-10">
                  <p type="text" class="form-control" id="case_number_wanted_criminals" name="case_number_wanted_criminals" >
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Case File:</label>
                <div class="col-sm-10">
                  <p type="text" class="form-control" id="case_file_wanted_criminals" name="case_file_wanted_criminals" >
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Tag:</label>
                <div class="col-sm-10">
                  <p class="form-select" aria-label="Default select example" id="select_tags_wanted_criminals"  name="select_tags_wanted_criminals">
                    <!-- <option value="#F00">Red - Actual Threat</option>
                    <option value="#ffa500">Orange - Possible Threat </option>
                    <option value="#FFFF00">Yellow - Aware </option> -->
                  </p>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Bounty:</label>
                <div class="col-sm-10">
                  <p type="number" class="form-control" id="bounty_wanted_criminals" name="bounty_wanted_criminals">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Police Officer:</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example"  id="vdetail.police_officer_wanted_criminals" name="police_officer_wanted_criminals">
                      @if(!empty($field_officers))
                        <option value="" disabled>-</option>
                        @foreach($field_officers as $key => $val)
                          <option value="{{$val['rank_add_field_officers'].' '.$val['fname_add_field_officers'].' '.$val['m_add_field_officers'].' ' .$val['lname_add_field_officers'] }}">{{$val['rank_add_field_officers']." ".$val['fname_add_field_officers']." " .$val['m_add_field_officers']." " .$val['lname_add_field_officers'] }}</option>
                        @endforeach
                      @endif
                    </select>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Date Filed: </label>
                <div class="col-sm-10">
                  <p type="date" class="form-control" id="date_filed_wanted_criminals" name="date_filed_wanted_criminals" >
                </div>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
  </div>
<!--==================== End  Wanted Criminal ========================================-->


<!--==================== Carnapped ===================================================-->
  <div class="modal fade" id="viewcarnapped" tabindex="-1" >
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"> Detail </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

        </div>
      </div>
    </div>
  </div>
  <!-- END -->
  <!-- Missing Person -->
<!-- Wanted Criminal   -->
<!-- Edit Modal Wanted Criminal List -->
<div class="modal fade" id="edit_wanted" tabindex="-1" >
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"> Update Wanted Criminal</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

            <div class="spinner_wanted" hidden>
                   <div class="spinner-border" role="status" style="
                  position: absolute;
                  height: 50px;
                  width: 50px;
                  top: 50%;
                  left: 50%;
                  margin-left: -50px;
                  margin-top: -50px;
                  background-size: 100%;
                ">
                <span class="visually-hidden">Loading...</span>
            </div>

              </div>
              <input type="hidden" name="id" id="id_wanted" value=""/>
              <!-- image here  -->
              <div class="detail_w" hidden>
                  <div class="col-sm-2">
                    <img src="{{asset('assets/img/user.png')}}" class="card-img-top" alt="..." id="image_wanted" style="  padding: 10px;  width: 200px; float: left;">
                  </div>

                  <div style="text-align: left; " >
                    <div class="row mb-3"id="vdetail.name_wanted_criminals">
                    <label  class="col-sm-6 col-form-label">Full Name:   </label>
                         <p class="wanted_name"></p>
                    </div>
                    <div class="row mb-3" id="vdetail.address_wanted_criminals">
                      <label  class="col-sm-6 col-form-label"> Aliases: </label>
                            <p class="wanted_alias"></p>
                    </div>
                    <div class="row mb-3" id="vdetail.age_wanted_criminals">
                      <label  class="col-sm-6 col-form-label">Bounty: </label>
                           <p class="wanted_bounty"></p>
                    </div>
                    <div class="row mb-3" id="vdetail.contact_wanted_criminals">
                      <label  class="col-sm-6 col-form-label"> Case :  </label>
                          <p class="wanted_case"></p>
                    </div>
                  </div>         


              </div>
            </div>
           </form>
         </div>
       </div>
</div>

  <!-- Close Case Wanted Criminal  -->
<div class="modal fade" id="closeCaseWanted" tabindex="-1" >
      <div class="modal-dialog modal-xs">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"> Close Case Wanted
             </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>

          </div>
        </div>
      </div>
    </div>
    <!-- END -->
    <!-- Missing Person -->
  <!-- Edit Modal Wanted Criminal List -->
  <div class="modal fade" id="edit_wanted" tabindex="-1" >
        <div class="modal-dialog modal-x2">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"> Edit Detail
               </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{url('update_criminal')}}"  enctype="multipart/form-data"> 
            <div class="modal-body">
              <div class="spinner_view_wanted" hidden>
                    <div class="spinner-border" role="status" style="
                      position: absolute;
                      height: 50px;
                      width: 50px;
                      top: 50%;
                      left: 50%;
                      margin-left: -50px;
                      margin-top: -50px;
                      background-size: 100%;
                    ">
                    <span class="visually-hidden">Loading...</span>
                  </div>
                </div>
                <input type="hidden" name="id" id="id_edit_wanted" value=""/>
                <!-- image here  -->
              <div class="view_edit_wanted" hidden>
          
                <div class="row mb-3">  
                  <div class="col-sm-4" >
                    <img src="assets/img/user.png" class="card-img-top" alt="..." id="output6" style="  padding: 5px;  width: 300px;">
                    <input onchange="output6(event)" class="form-control" type="file" id="formFile" name="file_image_wanted_criminals" >
                  </div>
                  </div>  
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Firstname: </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="fname_wanted_criminals" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Middle Name: </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="m_wanted_criminals" >
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Surname: </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="lname_wanted_criminals" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Alias/Nickname: </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nickname_wanted_criminals" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Case Number:</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="case_number_wanted_criminals" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Case File:</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="case_file_wanted_criminals" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Tag:</label>
                    <div class="col-sm-10">
                      <select class="form-select" aria-label="Default select example"  name="select_tags_wanted_criminals">
                          <option value="#F00">Red - Actual Threat</option>
                          <option value="#ffa500">Orange - Possible Threat </option>
                          <option value="#FFFF00">Yellow - Aware </option>
                      </select>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Bounty:</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" name="bounty_wanted_criminals" placeholder="bounty is required"required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Police Officer:</label>
                    <div class="col-sm-10">
                       <select class="form-select" aria-label="Default select example"  name="police_officer_wanted_criminals">
                          @if(!empty($field_officers))
                            <option value="" disabled>-</option>
                            @foreach($field_officers as $key => $val)
                              <option value="{{$val['rank_add_field_officers'].' '.$val['fname_add_field_officers'].' '.$val['m_add_field_officers'].' ' .$val['lname_add_field_officers'] }}">{{$val['rank_add_field_officers'].' '.$val['fname_add_field_officers'].' '.$val['m_add_field_officers'].' ' .$val['lname_add_field_officers'] }}</option>
                            @endforeach
                         @endif
                        </select>

                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Date Filed: </label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" name="date_filed_wanted_criminals" required>
                    </div>
                  </div>
                 </div>
                <div class="modal-footer">
                   <button type="submit" class="btn btn-secondary">Update</button>
                   <button type="button" class="btn btn-info" data-bs-dismiss="modal">Cancel</button>
                </div>
              </div>
             </form>
           </div>
         </div>
  </div>
  <!-- Close Case Wanted Criminal  -->
  <div class="modal fade" id="closeCaseWanted" tabindex="-1" >
        <div class="modal-dialog modal-x2">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"> Close Case Wanted
               </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{url('close_case_criminal')}}"> 
              <div class="modal-body">
                   <input type="hidden" name="id" id="id_close_wanted" value=""/>
                   <p>Do you want to close this case ? Please click to proceed </p>
              </div>
              <div class="modal-footer">
                   <button type="submit" class="btn btn-secondary">Procceed</button>
                   <button type="button" class="btn btn-info" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
          </div>
        </div>
  </div>
<!--==================== End  Wanted Criminal ========================================-->

<!--==================== Carnapped ===================================================-->
  <div class="modal fade" id="viewcarnapped" tabindex="-1" >
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"> Detail </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

            <div class="spinner_car" hidden>
                   <div class="spinner-border" role="status" style="
                  position: absolute;
                  height: 50px;
                  width: 50px;
                  top: 50%;
                  left: 50%;
                  margin-left: -50px;
                  margin-top: -50px;
                  background-size: 100%;
                ">
                <span class="visually-hidden">Loading...</span>
            </div>

              </div>
              <input type="hidden" name="id" id="id_car" value=""/>
              <!-- image here  -->
             <div class="detail_car" hidden>

              <div class="row mb-3">   
                <div class="col-sm-12" >
                  <ol  style="display: flex;justify-content: center;align-items: center;">
                    <div class="col-sm-3" style="margin:auto">
                        <img src="assets/img/car.png" class="card-img-top" alt="..." id="output" style="  padding: 5px;  width: 250;">
                    </div>
                    <div class="col-sm-3" style="margin:auto">
                      <img src="assets/img/car.png" class="card-img-top" alt="..." id="output1" style="  padding: 5px;  width: 250;">
                    </div>
                    <div class="col-sm-3" style="margin:auto" >
                      <img src="assets/img/car.png" class="card-img-top" alt="..." id="output2" style="  padding: 5px;  width: 250;">
                    </div>
                  </lo>  
                </div>
                </div>
                
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Owner Name: </label>
                  <div class="col-sm-10">
                    <p type="text" class="form-control" id="owner_name_carnapped" />
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Color: </label>
                  <div class="col-sm-10">
                    <p type="text" class="form-control" id="color_carnapped" />
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Case Number: </label>
                  <div class="col-sm-10">
                    <p type="text" class="form-control" id="case_number_carnapped" />
                  </div>
                </div>
            
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Plate Number: </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="plate_number_carnapped" required>
                  </div>
                </div>

                <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Vehicle Type:</label>
                  <div class="col-sm-10">
                    <p type="text" class="form-control"  id="select_vehicle_carnapped" />
                  </div>
                </div>

                <div  id="other_carnapped" class="row mb-3" hidden >
                  <label for="inputText" class="col-sm-2 col-form-label">Others : </label>
                  <div class="col-sm-10">
                   <p type="text" class="form-control"  id="other_carnapped" />
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Police Officer:</label>
                  <div class="col-sm-10">
                     <p type="date" class="form-control" id="police_officer_carnapped">

                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Date Lost: </label>
                  <div class="col-sm-10">
                    <p type="date" class="form-control" id="date_lost_carnapped">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Date Reported: </label>
                  <div class="col-sm-10">
                    <p type="date" class="form-control"  id="date_reported_carnapped"/>
                  </div>
                </div>
                <h5 class="card-title">Upload OR/CR:</h5>         
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Attached File</label>
                  <div class="col-sm-10">
                    <p class="form-control" type="file"   id="attached_file1_carnapped" />
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label" >Attached File</label>
                  <div class="col-sm-10">
                    <p class="form-control" type="file"  id="attached_file2_carnapped" />
                  </div>
                </div>
                <h5 class="card-title">Case Papers:</h5>         
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Attach Requirements</label>
                  <div class="col-sm-10">
                    <p class="form-control" type="file"  id="attached_file3_carnapped"/ >
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Attach Requirements</label>
                  <div class="col-sm-10">
                    <p class="form-control" type="file" id="attached_file4_carnapped"/ >
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Attach Requirements</label>
                  <div class="col-sm-10">
                    <p class="form-control" type="file"  id="attached_file5_carnapped" />
                  </div>
                </div>     
                <div class="row mb-3">
             </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>


          </div>
        </div>
      </div>
  </div>
  <!--Update Carnapped -->
  <div class="modal fade" id="edit_carnapped" tabindex="-1" >
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"> Update Carnapped
               </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
              <form method="post" action="{{url('update_carnapped')}}"  enctype="multipart/form-data"> 
              <div class="modal-body">
                
              <div class="spinner_view_carnapped" hidden>
                    <div class="spinner-border" role="status" style="
                      position: absolute;
                      height: 50px;
                      width: 50px;
                      top: 50%;
                      left: 50%;
                      margin-left: -50px;
                      margin-top: -50px;
                      background-size: 100%;
                    ">
                    <span class="visually-hidden">Loading...</span>
                  </div>

                </div>

                <input type="hidden" name="id" id="id_update_carnapped" value=""/>
                   
                <div class="view_edit_carnapped">
                  <div class="row mb-3">   
                  <div class="col-sm-12" >
                    <ol  style="display: flex;justify-content: center;align-items: center;">
                      <div class="col-sm-3" style="margin:auto">
                          <img src="assets/img/car.png" class="card-img-top" alt="..." id="output3" style="  padding: 5px;  width: 250;">
                           <input onchange="output3(event)" class="form-control" type="file" id="formFile" name="file_image_carnapped" >
                      </div>
                      <div class="col-sm-3" style="margin:auto">
                        <img src="assets/img/car.png" class="card-img-top" alt="..." id="output4" style="  padding: 5px;  width: 250;">
                        <input onchange="output4(event)" class="form-control" type="file" id="formFile1" name="file1_image_carnapped" >
                      </div>
                      <div class="col-sm-3" style="margin:auto" >
                        <img src="assets/img/car.png" class="card-img-top" alt="..." id="output5" style="  padding: 5px;  width: 250;">
                       <input onchange="output5(event)" class="form-control" type="file" id="formFile2" name="file2_image_carnapped" >
                      </div>
                    </lo>  
                  </div>
                  </div>
                  
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Owner Name: </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="owner_name_carnapped" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Color: </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="color_carnapped" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Case Number: </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="case_number_carnapped" required>
                    </div>
                  </div>
              
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Plate Number: </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="plate_number_carnapped" required>
                    </div>
                  </div>

                  <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Vehicle Type:</label>
                    <div class="col-sm-10">
                      <select class="form-select" aria-label="Default select example" id="select_vehicle"   name="select_vehicle_carnapped">
                        <option selected>-</option>
                        <option value="Hatchback">Hatchback</option>
                        <option value="Sedan">Sedan</option>
                        <option value="SUV">SUV</option>
                        <option value="MUV">MUV</option>
                        <option value="Crossover">Crossover</option>
                        <option value="Jeep">Jeep </option>
                        <option value="Van">Van</option>
                        <option value="Multicab">Multicab</option>
                        <option value="Toyota Innova">Toyota Innova</option>
                        <option value="Toyota Wigo">Toyota Wigo</option>
                        <option value="Toyota Raize">Toyota Raize</option>
                        <option value="Toyota Vios">Toyota Vios</option>
                        <option value="Mazda"> Mazda</option>
                        <option value="Others">Others</option>
                      </select>
                    </div>
                  </div>

                  <div  id="other_carnapped" class="row mb-3" hidden >
                    <label for="inputText" class="col-sm-2 col-form-label">Others : </label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control"  name="other_carnapped" >
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Police Officer:</label>
                    <div class="col-sm-10">
                      <select class="form-select" aria-label="Default select example"  name="police_officer_carnapped">
                          @if(!empty($field_officers))
                            <option value="" disabled>-</option>
                            @foreach($field_officers as $key => $val)
                              <option value="{{$val['rank_add_field_officers'].' '.$val['fname_add_field_officers'].' '.$val['m_add_field_officers'].' ' .$val['lname_add_field_officers'] }}">{{$val['rank_add_field_officers']." ".$val['fname_add_field_officers']." " .$val['m_add_field_officers']." " .$val['lname_add_field_officers'] }}</option>
                            @endforeach
                         @endif
                        </select>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Date Lost: </label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" name="date_lost_carnapped" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Date Reported: </label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control"  name="date_reported_carnapped" required>
                    </div>
                  </div>
                  <h5 class="card-title">Upload OR/CR:</h5>         
                  <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Attached File</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="file"   name="attached_file1_carnapped" >
                    </div>
                    <div class="col-sm-10">
                      <p class="form-control" type="file"   id="attached_file1_carnapped1" >
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label" >Attached File</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="file"  name="attached_file2_carnapped" >
                    </div>
                    <div class="col-sm-10">
                      <p class="form-control" type="file"  id="attached_file2_carnapped2" >
                    </div>   
                  </div>
                  <h5 class="card-title">Case Papers:</h5>         
                  <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Attach Requirements</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="file"  name="attached_file3_carnapped" >
                    </div>
                    <div class="col-sm-10">
                       <p class="form-control" type="file"  id="attached_file3_carnapped3" >
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Attach Requirements</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="file" name="attached_file4_carnapped" >
                    </div>
                    <div class="col-sm-10">
                      <p class="form-control" type="file" id="attached_file4_carnapped4" >
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Attach Requirements</label>
                    <div class="col-sm-10">
                      <input  class="form-control" type="file"  name="attached_file5_carnapped" >
                    </div>
                    <div class="col-sm-10">
                      <p class="form-control" type="file"  id="attached_file5_carnapped5" >
                    </div>
                  </div>     
                </div>   

                  </div>
              <div class="modal-footer">
                   <button type="submit" class="btn btn-secondary">Update</button>
                   <button type="button" class="btn btn-info" data-bs-dismiss="modal">Cancel</button>
                </div>

                </div>

                <input type="hidden" name="id" id="id_update_carnapped" value=""/>
                   
                <div class="view_edit_carnapped">
                  <div class="row mb-3">   
                  <div class="col-sm-12" >
                    <ol  style="display: flex;justify-content: center;align-items: center;">
                      <div class="col-sm-3" style="margin:auto">
                          <img src="assets/img/car.png" class="card-img-top" alt="..." id="output3" style="  padding: 5px;  width: 250;">
                           <input onchange="output3(event)" class="form-control" type="file" id="formFile" name="file_image_carnapped" >
                      </div>
                      <div class="col-sm-3" style="margin:auto">
                        <img src="assets/img/car.png" class="card-img-top" alt="..." id="output4" style="  padding: 5px;  width: 250;">
                        <input onchange="output4(event)" class="form-control" type="file" id="formFile1" name="file1_image_carnapped" >
                      </div>
                      <div class="col-sm-3" style="margin:auto" >
                        <img src="assets/img/car.png" class="card-img-top" alt="..." id="output5" style="  padding: 5px;  width: 250;">
                       <input onchange="output5(event)" class="form-control" type="file" id="formFile2" name="file2_image_carnapped" >
                      </div>
                    </lo>  
                  </div>
                  </div>
                  
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Owner Name: </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="owner_name_carnapped" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Color: </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="color_carnapped" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Case Number: </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="case_number_carnapped" required>
                    </div>
                  </div>
              
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Plate Number: </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="plate_number_carnapped" required>
                    </div>
                  </div>

                  <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Vehicle Type:</label>
                    <div class="col-sm-10">
                      <select class="form-select" aria-label="Default select example" id="select_vehicle"   name="select_vehicle_carnapped">
                        <option selected>-</option>
                        <option value="Hatchback">Hatchback</option>
                        <option value="Sedan">Sedan</option>
                        <option value="SUV">SUV</option>
                        <option value="MUV">MUV</option>
                        <option value="Crossover">Crossover</option>
                        <option value="Jeep">Jeep </option>
                        <option value="Van">Van</option>
                        <option value="Multicab">Multicab</option>
                        <option value="Toyota Innova">Toyota Innova</option>
                        <option value="Toyota Wigo">Toyota Wigo</option>
                        <option value="Toyota Raize">Toyota Raize</option>
                        <option value="Toyota Vios">Toyota Vios</option>
                        <option value="Mazda"> Mazda</option>
                        <option value="Others">Others</option>
                      </select>
                    </div>
                  </div>

                  <div  id="other_carnapped" class="row mb-3" hidden >
                    <label for="inputText" class="col-sm-2 col-form-label">Others : </label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control"  name="other_carnapped" >
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Police Officer:</label>
                    <div class="col-sm-10">
                      <select class="form-select" aria-label="Default select example"  name="police_officer_carnapped">
                          @if(!empty($field_officers))
                            <option value="" disabled>-</option>
                            @foreach($field_officers as $key => $val)
                              <option value="{{$val['rank_add_field_officers'].' '.$val['fname_add_field_officers'].' '.$val['m_add_field_officers'].' ' .$val['lname_add_field_officers'] }}">{{$val['rank_add_field_officers']." ".$val['fname_add_field_officers']." " .$val['m_add_field_officers']." " .$val['lname_add_field_officers'] }}</option>
                            @endforeach
                         @endif
                        </select>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Date Lost: </label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" name="date_lost_carnapped" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Date Reported: </label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control"  name="date_reported_carnapped" required>
                    </div>
                  </div>
                  <h5 class="card-title">Upload OR/CR:</h5>         
                  <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Attached File</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="file"   name="attached_file1_carnapped" >
                    </div>
                    <div class="col-sm-10">
                      <p class="form-control" type="file"   id="attached_file1_carnapped1" >
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label" >Attached File</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="file"  name="attached_file2_carnapped" >
                    </div>
                    <div class="col-sm-10">
                      <p class="form-control" type="file"  id="attached_file2_carnapped2" >
                    </div>   
                  </div>
                  <h5 class="card-title">Case Papers:</h5>         
                  <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Attach Requirements</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="file"  name="attached_file3_carnapped" >
                    </div>
                    <div class="col-sm-10">
                       <p class="form-control" type="file"  id="attached_file3_carnapped3" >
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Attach Requirements</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="file" name="attached_file4_carnapped" >
                    </div>
                    <div class="col-sm-10">
                      <p class="form-control" type="file" id="attached_file4_carnapped4" >
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Attach Requirements</label>
                    <div class="col-sm-10">
                      <input  class="form-control" type="file"  name="attached_file5_carnapped" >
                    </div>
                    <div class="col-sm-10">
                      <p class="form-control" type="file"  id="attached_file5_carnapped5" >
                    </div>
                  </div>     
                </div>   

                  </div>
              <div class="modal-footer">
                   <button type="submit" class="btn btn-secondary">Update</button>
                   <button type="button" class="btn btn-info" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
          </div>
        </div>
  </div>
  <!-- Close Case Carnapped  -->
  <div class="modal fade" id="closeCaseCarnapped" tabindex="-1" >
        <div class="modal-dialog modal-x2">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"> Close Case
               </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{url('close_case_carnapped')}}"> 
              <div class="modal-body">
                   <input type="hidden" name="id" id="id_close_carnapped" value=""/>
                   <p>Do you want to close this case ? Please click to proceed </p>
              </div>
              <div class="modal-footer">
                   <button type="submit" class="btn btn-secondary">Procceed</button>
                   <button type="button" class="btn btn-info" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
          </div>
        </div>
  </div>
<!--============================ End Carnapped ========================================-->
<!--============================ Missing Person =======================================-->
  <div class="modal fade" id="viewmissingperson" tabindex="-1" >
      <div class="modal-dialog modal-x2">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"> View Missing Person</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

            <div class="spinner_mp" hidden>
                   <div class="spinner-border" role="status" style="
                  position: absolute;
                  height: 50px;
                  width: 50px;
                  top: 50%;
                  left: 50%;
                  margin-left: -50px;
                  margin-top: -50px;
                  background-size: 100%;
                ">
                <span class="visually-hidden">Loading...</span>
            </div>

              </div>
              <input type="hidden" name="id" id="id_missing_p" value=""/>
              <!-- image here  -->
               <div class="detail_mp" hidden>
               </div>
          </div>

        </div>
      </div>
  </div>


  <div class="modal fade" id="edit_missingp" tabindex="-1" >
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"> Update Missing Person Profile </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>

          </div>
        </div>
    </div>
  </div>


  <div class="modal fade" id="edit_missingp" tabindex="-1" >
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"> Update Missing Person Profile </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>

<!-- Missing Person -->
<div class="modal fade" id="viewmissingperson" tabindex="-1" >
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"> Detail Missing Person </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
       <form method="post" action="{{url('close_case_missing')}}"> 
          <div class="modal-body">
                <input type="hidden" name="id" id="id_close_missing" value=""/>
                <p>Do you want to close this case ? Please click to proceed </p>
          </div>
          <div class="modal-footer">
                <button type="submit" class="btn btn-secondary">Procceed</button>
                <button type="button" class="btn btn-info" data-bs-dismiss="modal">Cancel</button>
            </div>
            <input type="hidden" name="id" id ="id_missing_p" value=""/>
            <!-- image here  -->
        <div class="detail_mp" hidden>
          <div>
          <div class="row mb-3">  
            <div class="col-sm-4" >
              <img src="assets/img/user.png" class="card-img-top" alt="..." id="image_missing" style="  padding: 5px;  width: 300px;">
            </div>
          </div> 
            
          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label"> Full Name: </label>
            <div class="col-sm-10">
              <p type="text" class="form-control" id="missing_name"/ >
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Alias/Nickname: </label>
            <div class="col-sm-10">
              <p type="text" class="form-control" id="nickanme_name_missing_person"/ >
            </div>
          </div>

          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Address: </label>
            <div class="col-sm-10">
              <p type="text" class="form-control" id="address_missing_person"/ >
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Last seen location: </label>
            <div class="col-sm-10">
              <p type="text" class="form-control" id="location_missing_person"/ >
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputDate" class="col-sm-2 col-form-label">Last seen date:</label>
            <div class="col-sm-10">
              <p type="date" class="form-control" id="date_missing_person"/ >
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Guardian/ Reporter: </label>
            <div class="col-sm-10">
              <p type="text" class="form-control" id="gaurdian_missing_person"/ >
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Contact Person's Number: </label>
            <div class="col-sm-10">
              <p type="text" class="form-control" id="contact_missing_person"/ >
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Region:</label>
            <div class="col-sm-10">
              <p type="text" class="form-control" id="region_missing_person"/ >
            </div>
          </div>


          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Province:</label>
            <div class="col-sm-10">
              <p class="form-select" aria-label="Default select example" id="province_missing_person"/   >
            </div>
          </div>


          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">City:</label>
            <div class="col-sm-10">
              <p class="form-select" aria-label="Default select example"id="city_missing_person"/  >
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Station Name:</label>
            <div class="col-sm-10">
              <p class="form-select" aria-label="Default select example"id="station_name_missing_person"/ >
            </div>
          </div>


          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Station Number:</label>
            <div class="col-sm-10">
              <p class="form-select" aria-label="Default select example" id="station_num_missing_person"/ >
              
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Police Officer: </label>
            <div class="col-sm-10">

              <p class="form-select" aria-label="Default select example"  id="police_officer_missing_person"/ >
              
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Date Filed: </label>
            <div class="col-sm-10">
              <input type="date" class="form-control" id="date_filed_missing_person"/ >
            </div>
          </div>
          <h5 class="card-title">Attach Supporting Files</h5>         
          <div class="row mb-3">
            <label for="inputNumber" class="col-sm-2 col-form-label" >File Upload</label>
            <div class="col-sm-10">
              <p class="form-control" type="file"  id="doc1_missing_person_url" />
            </div>
          </div> 
          <div class="row mb-3">
            <label for="inputNumber" class="col-sm-2 col-form-label" >File Upload</label>
            <div class="col-sm-10">
              <p class="form-control" type="file"  id="doc2_missing_person_url" />
            </div>
          </div> 
          <div class="row mb-3">
            <label for="inputNumber" class="col-sm-2 col-form-label" >File Upload</label>
            <div class="col-sm-10">
              <p class="form-control" type="file"  id="doc3_missing_person_url" />
            </div>
          </div> 
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>

        </div>
      </div>
    </div>
  </div>
<!--============================= end Missing Person  ==================================-->


  <div class="modal fade" id="closeCasemissing" tabindex="-1" >
    <div class="modal-dialog modal-x2">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"> Close Case Missing Person
            </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
       <form method="post" action="{{url('close_case_missing')}}"> 
          <div class="modal-body">
                <input type="hidden" name="id" id="id_close_missing" value=""/>
                <p>Do you want to close this case ? Please click to proceed </p>
          </div>
          <div class="modal-footer">
                <button type="submit" class="btn btn-secondary">Procceed</button>
                <button type="button" class="btn btn-info" data-bs-dismiss="modal">Cancel</button>
            </div>
        </form>
      </div>
    </div>
  </div>
<!--============================= end Missing Person  ==================================-->

<!--================================= Notification =====================================-->
  <div class="modal fade" id="request_deac_police_officer" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <form method="post" action="{{url('request_deactivation_officer')}}">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Send Request Deactivation</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              Do you want to request deactivation for this police officer   ?
              <p style="text-transform:bold" id="name_req_police_officer"> </p>
              <input type="hidden" name="id" id="request_id" value=""/>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Proceed</button>
          </div>
        </div>      
      </form>
    </div>
  </div>
<!--================================= Notification =====================================-->
        <div class="modal-body">
        <form method="post" action="{{url('update_missing_person')}}"  enctype="multipart/form-data"> 
          <div class="spinner_update_mp" hidden>
                 <div class="spinner-border" role="status" style="
                position: absolute;
                height: 50px;
                width: 50px;
                top: 50%;
                left: 50%;
                margin-left: -50px;
                margin-top: -50px;
                background-size: 100%;
              ">
              <span class="visually-hidden">Loading...</span>
              </div>

                </div>
                <input type="hidden" name="id" id ="id_update_mp" value=""/>
                  <!-- image here  -->
                  <div class="update_missing_p" hidden>
                    <div>
                    <div class="row mb-3">  
                      <div class="col-sm-4" >
                        <img src="assets/img/user.png" class="card-img-top" alt="..." id="scr_image_missing" style="  padding: 5px;  width: 300px;">
                      </div>
                    </div> 
                      
                  <div class="row mb-3">
                          <label for="inputText" class="col-sm-2 col-form-label">Firstname: </label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="fname_missing_person" required>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label for="inputText" class="col-sm-2 col-form-label">Middle Name: </label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="m_missing_person">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label for="inputText" class="col-sm-2 col-form-label">Lastname: </label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="lname_missing_person" required>
                          </div>
                        </div>
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Alias/Nickname: </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nickanme_name_missing_person"/ >
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Address: </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="address_missing_person"/ >
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Last seen location: </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="location_missing_person"/ >
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputDate" class="col-sm-2 col-form-label">Last seen date:</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" name="date_missing_person"/ >
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Guardian/ Reporter: </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="gaurdian_missing_person"/ >
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Contact Person's Number: </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="contact_missing_person"/ >
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Region:</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="region_missing_person"/ >
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Province:</label>
                    <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" id="select_province_missing_person" name="select_province_missing_person"/   >
                        <option selected>-</option>
                        <option value="0">Tagbilaran City</option>
                        <option value="1">Bogo City</option>
                        <option value="2">Carcar City</option>
                        <option value="3">Cebu City</option>
                        <option value="4">Danao City</option>
                        <option value="5">Lapu-Lapu City</option>
                        <option value="6">Mandaue City</option>
                        <option value="7">Naga City</option>
                        <option value="8">Talisay City</option>
                        <option value="9">Bais City</option>
                        <option value="10">Bayawan City</option>
                        <option value="11">Canlaon City</option>
                        <option value="12">Dumaguete City</option>
                        <option value="13">Guihulngan City</option>
                        <option value="14">Tanjay City</option>
                        <option value="15">Toledo City</option>
                        </select> 
                      </div>
                    </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">City:</label>
                    <div class="col-sm-10">
                      <select class="form-select" aria-label="Default select example"id="select_city_missing_person"  name="select_city_missing_person">

                      </select>
                    </div>
                    </div>

                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Station Name:</label>
                    <div class="col-sm-10">
                      <select class="form-select" aria-label="Default select example"id="select_station_name" name="select_station_name_missing_person" >
                      </select>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Station Number:</label>
                    <div class="col-sm-10">
                      <select class="form-select" aria-label="Default select example" id="station_num_missing_person" name="station_num_missing_person"/ >
                      </select>
                    </div>
                  </div>
                  <div class="row mb-3">
                          <label for="inputText" class="col-sm-2 col-form-label">Police Officer: </label>
                          <div class="col-sm-10">
          
                            <select class="form-select" aria-label="Default select example"  name="police_officer_missing_person">
                                @if(!empty($field_officers))
                                  <option value="" disabled>-</option>
                                  @foreach($field_officers as $key => $val)
                                    <option value="{{$val['rank_add_field_officers'].' '.$val['fname_add_field_officers'].' '.$val['m_add_field_officers'].' ' .$val['lname_add_field_officers'] }}">{{$val['rank_add_field_officers']." ".$val['fname_add_field_officers']." " .$val['m_add_field_officers']." " .$val['lname_add_field_officers'] }}</option>
                                  @endforeach
                              @endif
                              </select>
                          </div>
                        </div>
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Date Filed: </label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" name="date_filed_missing_person"/ >
                    </div>
                  </div>
                  <h5 class="card-title">Attach Supporting Files</h5>         
                  <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label" >File Upload</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="file"  name="doc1_missing_person_url" />
                    </div>
                    <div class="col-sm-10">
                       <p class="form-control" type="file"  id="doc1_missing_person_url1"/ >
                    </div> 
                  </div> 
                  <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label" >File Upload</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="file"  name="doc2_missing_person_url" />
                    </div>
                    <div class="col-sm-10">
                       <p class="form-control" type="file"  id="doc2_missing_person_url2" />
                    </div>     
                  </div> 
                  <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label" >File Upload</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="file"  id="doc3_missing_person_url" />
                    </div>
                    <div class="col-sm-10">
                       <p class="form-control" type="file"  id="doc3_missing_person_url3"/ >
                    </div> 
                  </div> 
                  </div>
                </div>
                  <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary">Update</button>
                        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Cancel</button>
                  </div>
            </form>
          </div>
      </div>
    </div>
</div>

<div class="modal fade" id="closeCaseMissingPerson" tabindex="-1" >
      <div class="modal-dialog modal-x2">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"> Close  Case Missing Person
             </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form method="post" action="{{url('close_case_missing_person')}}"> 
            <div class="modal-body">
                <input type="hidden" name="id" id="id_close_missing_person" />
                 <p>Do you want to close this case ? Please click to proceed </p>
            </div>
            <div class="modal-footer">
                 <button type="submit" class="btn btn-secondary">Procceed</button>
                 <button type="button" class="btn btn-info" data-bs-dismiss="modal">Cancel</button>
              </div>
          </form>
        </div>
      </div>
</div>

<!--end Missing Person  -->