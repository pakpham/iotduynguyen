<div class="card">
  <div class="card-header">
    <h5><b>Dữ liệu gần nhất: </b> <b style="color: red" id="created-at">
      @if(isset($last_data[0]->ss1))
                {{$last_data[0]->created_at}}
      @endif
      </b>
      </h5>
  </div>
<div class="row card-body">
 <div class="col-lg-3 col-md-6">
   <div class="card">
     <div class="card-body">
       <div class="stat-widget-five">
         <div class="stat-icon dib flat-color-1">
           <i class="pe-7f-browser"></i>
         </div>
         <div class="stat-content">
           <div class="text-left dib"> 
             <div class="stat-text">
              <span class="count" id="value-ss1">
                @if(isset($last_data[0]->ss1))
                {{$last_data[0]->ss1}}
                @endif  
              </span> <span>%</span>
            </div>
            <div class="stat-heading">Cảm biến 1</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-lg-3 col-md-6">
 <div class="card">
   <div class="card-body">
     <div class="stat-widget-five">
       <div class="stat-icon dib flat-color-2">
         <i class="pe-7f-browser"></i>
       </div>
       <div class="stat-content">
         <div class="text-left dib">
           <div class="stat-text"><span  class="count" id="value-ss2">@if(isset($last_data[0]->ss2))
            {{$last_data[0]->ss2}}
          @endif</span> <span>°C</span> 
        </div>
          <div class="stat-heading">Cảm biến 2</div> 
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<div class="col-lg-3 col-md-6">
 <div class="card">
   <div class="card-body">
     <div class="stat-widget-five">
       <div class="stat-icon dib flat-color-3">
         <i class="pe-7f-browser"></i>
       </div>
       <div class="stat-content">
         <div class="text-left dib"> 
           <div class="stat-text"><span class="count" id="value-ss3">@if(isset($last_data[0]->ss3))
            {{$last_data[0]->ss3}}
          @endif</span> <span>%</span>
        </div>
          <div class="stat-heading">Cảm biến 3</div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<div class="col-lg-3 col-md-6">
 <div class="card">
   <div class="card-body">
     <div class="stat-widget-five">
       <div class="stat-icon dib flat-color-4">
         <i class="pe-7f-browser"></i>
       </div>
       <div class="stat-content">
         <div class="text-left dib"> 
           <div class="stat-text"><span class="count" id="value-ss4">@if(isset($last_data[0]->ss4))
            {{$last_data[0]->ss4}}
          @endif</span></div>
          <div class="stat-heading">Cảm biến 4</div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div> 
</div>

<!-- ============================================= -->
<!-- ============================================= -->
<!-- ============================================= -->
<!-- ============================================= -->
<!-- ============================================= -->

<div class="card">
  <div class="card-header">
    <h5><b>Dữ liệu gần nhất: </b> <b style="color: red" id="created-at-2">
      @if(isset($last_data_2[0]->ss1))
                {{$last_data_2[0]->created_at}}
      @endif
      </b>
      </h5>
  </div>
<div class="row card-body">
 <div class="col-lg-3 col-md-6">
   <div class="card">
     <div class="card-body">
       <div class="stat-widget-five">
         <div class="stat-icon dib flat-color-1">
           <i class="pe-7f-browser"></i>
         </div>
         <div class="stat-content">
           <div class="text-left dib"> 
             <div class="stat-text">
              <span class="count" id="value-ss1-2">
                @if(isset($last_data_2[0]->ss1))
                {{$last_data_2[0]->ss1}}
                @endif  
              </span> <span>%</span>
            </div>
            <div class="stat-heading">Cảm biến 1</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-lg-3 col-md-6">
 <div class="card">
   <div class="card-body">
     <div class="stat-widget-five">
       <div class="stat-icon dib flat-color-2">
         <i class="pe-7f-browser"></i>
       </div>
       <div class="stat-content">
         <div class="text-left dib">
           <div class="stat-text"><span  class="count" id="value-ss2-2">@if(isset($last_data_2[0]->ss2))
            {{$last_data_2[0]->ss2}}
          @endif</span><span>°C</span> 
        </div>
          <div class="stat-heading">Cảm biến 2</div> 
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<div class="col-lg-3 col-md-6">
 <div class="card">
   <div class="card-body">
     <div class="stat-widget-five">
       <div class="stat-icon dib flat-color-3">
         <i class="pe-7f-browser"></i>
       </div>
       <div class="stat-content">
         <div class="text-left dib"> 
           <div class="stat-text"><span class="count" id="value-ss3-2">@if(isset($last_data_2[0]->ss3))
            {{$last_data_2[0]->ss3}}
          @endif</span> <span>%</span>
        </div>
          <div class="stat-heading">Cảm biến 3</div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<div class="col-lg-3 col-md-6">
 <div class="card">
   <div class="card-body">
     <div class="stat-widget-five">
       <div class="stat-icon dib flat-color-4">
         <i class="pe-7f-browser"></i>
       </div>
       <div class="stat-content">
         <div class="text-left dib"> 
           <div class="stat-text"><span class="count" id="value-ss4-2">@if(isset($last_data_2[0]->ss4))
            {{$last_data_2[0]->ss4}}
          @endif</span></div>
          <div class="stat-heading">Cảm biến 4</div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div> 
</div>