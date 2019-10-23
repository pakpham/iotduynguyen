  <div class="col-sm-12">
    <div class="card">
      <div class="card-header">{{trans('warning.tram')}}  3</div>
      <div class="card-body">
        <form>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">{{trans('warning.cambien')}} 1:</label>
            <div class="col-sm-4">
              <input type="number" class="form-control" id="warning-ss3-1" name="warning-ss1-1" placeholder="number" value="@if(isset($sss3)){{$sss3[0]->ss1}}@endif">
            </div>
            <div class="col-sm-2">{{trans('warning.capnhatkhi')}}:</div>
            <div class="col-sm-4">
              <div class="form-group">
                <select class="form-control" id="warning-sign-ss3-1" name="warning-sign-ss3-1"  >
                  <option value="1" >{{trans('warning.caohonnguong')}}</option>
                  <option <?php if(isset($sss3)) if($sss3[0]->ss1_sign == 0 )echo'selected';?>  value="0">{{trans('warning.thaphonnguong')}}</option>
                </select>
              </div>                  
            </div>
          </div>

          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">{{trans('warning.cambien')}} 2:</label>
            <div class="col-sm-4">
              <input type="number" class="form-control" id="warning-ss3-2" name="warning-ss3-2" placeholder="number"value="@if(isset($sss3)){{$sss3[0]->ss2}}@endif">
            </div>
            <div class="col-sm-2">{{trans('warning.capnhatkhi')}}:</div>
            <div class="col-sm-4">
              <div class="form-group">
                <select class="form-control" id="warning-sign-ss3-2" name="warning-sign-ss3-2">
                  <option value="1">{{trans('warning.caohonnguong')}}</option>
                  <option <?php if(isset($sss3)) if($sss3[0]->ss2_sign == 0 )echo'selected';?> value="0">{{trans('warning.thaphonnguong')}}</option>
                </select>
              </div>                  
            </div>
          </div>

          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">{{trans('warning.cambien')}} 3:</label>
            <div class="col-sm-4">
              <input type="number" class="form-control" id="warning-ss3-3" name="warning-ss1-3" placeholder="number" value="@if(isset($sss3)){{$sss3[0]->ss3}}@endif">
            </div>
            <div class="col-sm-2">{{trans('warning.capnhatkhi')}}:</div>
            <div class="col-sm-4">
              <div class="form-group">
                <select class="form-control" id="warning-sign-ss3-3" name="warning-sign-ss3-3">
                  <option value="1">{{trans('warning.caohonnguong')}}</option>
                  <option <?php if(isset($sss3)) if($sss3[0]->ss3_sign == 0 )echo'selected';?> value="0">{{trans('warning.thaphonnguong')}}</option>
                </select>
              </div>                  
            </div>
          </div>

          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">{{trans('warning.cambien')}} 4:</label>
            <div class="col-sm-4">
              <input type="number" class="form-control" id="warning-ss3-4" name="warning-ss3-4" placeholder="number" value="@if(isset($sss3)){{$sss3[0]->ss4}}@endif">
            </div>
            <div class="col-sm-2">{{trans('warning.capnhatkhi')}}:</div>
            <div class="col-sm-4">
              <div class="form-group">
                <select class="form-control" id="warning-sign-ss3-4" name="warning-sign-ss3-4">
                  <option value="1">{{trans('warning.caohonnguong')}}</option>
                  <option <?php if(isset($sss3)) if($sss3[0]->ss4_sign == 0 )echo'selected';?> value="0">{{trans('warning.thaphonnguong')}}</option>
                </select>
              </div>                  
            </div>
          </div>
          <input type="hidden" name="{{trans('warning.cambien')}} _{{trans('warning.tram')}} " value="1" >    

        </form>
        <div class="form-group row">
          <div class="col-sm-12">
            <button id="btn-warning-sss3" type="" class="btn btn-primary"  >{{trans('warning.luu')}}</button>

          </div>

        </div>
      </div>
    </div>
  </div>