
@extends('restaurant.base')



@section('content')
{{App::setLocale(Session::get('locale'))}}






    <div class="ms-content-wrapper">
      <div class="row">

        <div class="col-xl-12 col-md-12">
            <div class="ms-panel">
              <div class="ms-panel-header">
                <h6>  </h6>
              </div>
              <div class="ms-panel-body">
                <p class="ms-directions"> </p>

             
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">{{__('Meal')}}</th>
                        <th scope="col">{{__('saturday')}}</th>
                        <th scope="col">{{__('sunday')}}</th>
                        <th scope="col">{{__('monday')}}</th>
                        <th scope="col">{{__('tuesday')}}</th>
                        <th scope="col">{{__('wednesday')}}</th>
                        <th scope="col">{{__('thursday')}}</th>
                        <th scope="col">{{__('friday')}}</th>
                        <th scope="col">{{__('Action')}}</th>
                      </tr>
                    </thead>
                    <tbody id="tabletoAdd" >
              

                      @foreach($weekPrograms as $weekProgram)
                      <tr id="tdinputtosubmit{{$weekProgram->id}}">
                        <th scope="row">{{$weekProgram->meal->mealName}}</th>
                        <td ><input class="hidden{{$weekProgram->id}}" type="hidden"  value="{{$weekProgram->saturday}}" style="width: 50px" >  <p class="pclass{{$weekProgram->id}}" >{{$weekProgram->saturday}}</p></td>
                        <td ><input class="hidden{{$weekProgram->id}}" type="hidden"  value="{{$weekProgram->sunday}}" style="width: 50px" >  <p class="pclass{{$weekProgram->id}}" >{{$weekProgram->sunday}}</p></td>
                        <td ><input class="hidden{{$weekProgram->id}}" type="hidden"  value="{{$weekProgram->monday}}" style="width: 50px" >  <p class="pclass{{$weekProgram->id}}" >{{$weekProgram->monday}}</p></td>
                        <td ><input class="hidden{{$weekProgram->id}}" type="hidden"  value="{{$weekProgram->tuesday}}" style="width: 50px" >  <p class="pclass{{$weekProgram->id}}" >{{$weekProgram->tuesday}}</p></td>
                        <td ><input class="hidden{{$weekProgram->id}}" type="hidden"  value="{{$weekProgram->wednesday}}" style="width: 50px" >  <p class="pclass{{$weekProgram->id}}" >{{$weekProgram->wednesday}}</p></td>
                        <td ><input class="hidden{{$weekProgram->id}}" type="hidden"  value="{{$weekProgram->thursday}}" style="width: 50px" >  <p class="pclass{{$weekProgram->id}}" >{{$weekProgram->thursday}}</p></td>
                        <td ><input class="hidden{{$weekProgram->id}}" type="hidden"  value="{{$weekProgram->friday}}" style="width: 50px" >  <p class="pclass{{$weekProgram->id}}" >{{$weekProgram->friday}}</p></td>
                      <td>
                        <button onclick="hidePshowInput('pclass{{$weekProgram->id}}','hidden{{$weekProgram->id}}'  , 'edit{{$weekProgram->id}}' , 'confirm{{$weekProgram->id}}' )" id="edit{{$weekProgram->id}}" class="ms-btn-icon btn-pill btn-info" > edit </button> 
                        <button id="confirm{{$weekProgram->id}}" style="display: none;" onclick="submitchange('tdinputtosubmit{{$weekProgram->id}}',{{$weekProgram->id}})" class="ms-btn-icon btn-pill btn-success" >submit</button> 
                        <button onclick="deleteweek({{$weekProgram->id}})" class="ms-btn-icon btn-pill btn-danger" > delete </button> 
                       </td>
                      </tr>
                      @endforeach
                     
                    
                    </tbody>

                  </table>
                  <button onclick="addLineInProgram();" id="addbtnanis" class="btn btn-pill bg-instagram has-icon" > Add Meal Program </button>
                
                  <button onclick="submitLine();" style="display: none;" id="subitaddbtn" class="btn btn-pill btn-gradient-success"  > submit </button>
                </div>
              </div>
            </div>
          </div>

      </div>
    </div>

    
   

<form method="POST" action="{{ url('restaurant/weekProgramForm') }}" id="formweekprg" >
    @csrf


        <input id="validationCustom36" name="var[]" type="hidden" value="" />
    </form>


    <form method="POST" action="{{ url('restaurant/updateOneWeekProgramForm') }}" id="anachikour" >
      @csrf
  
  
      <input id="idweekprhidden" name="id_week_program" type="hidden" value="" />
          <input id="inputhidenupdateweek" name="var[]" type="hidden" value="" />
      </form>

      <form method="POST" action="{{ url('restaurant/deleteOneWeekProgramForm') }}" id="anachikourbezzaf" >
        @csrf
    
    
        <input id="iddeletweekinput" name="id_week_program" type="hidden" value="" />
        </form>
  

@endsection


@section('script')

<script>

  function deleteweek(idweek)
  {
    var hidinput = document.getElementById('iddeletweekinput').value= idweek;

document.getElementById('anachikourbezzaf').submit();

  }
  
//=================================================================
  function submitchange(idtrforhiddeninput, idweekform)
  {

    
var formElements21 = new Array();
var text = "#"+idtrforhiddeninput+" :input";
var text1 = "#"+idtrforhiddeninput+" :button";
console.log(text);
$(text).not(text1).each(function(){
    formElements21.push($(this).val());
});

var hidinput = document.getElementById('inputhidenupdateweek').value= formElements21;
var hidinput = document.getElementById('idweekprhidden').value= idweekform;

document.getElementById('anachikour').submit();

  }
  
//=================================================================
  function hidePshowInput(classname,hiddenclass, ideditbutton , idconformbutton){
    
   
    //hide p element
    var elems = document.getElementsByClassName(classname);
    for (var i=0;i<elems.length;i+=1)
    {
       elems[i].style.display = 'none';
    }

    //display input element
    var hisemi = document.getElementsByClassName(hiddenclass);
    for (var i=0;i<hisemi.length;i+=1)
    {
       hisemi[i].type = "number";
    }


    //hide button add

    document.getElementById("addbtnanis").style.display = 'none';


    //hide button edit

  document.getElementById(ideditbutton).style.display = 'none';

    // display button confirm
    document.getElementById(idconformbutton).style.display = 'block';


    
  
  }


//=================================================================

    function submitLine(){
   

var formElements = new Array();
$("#tabletoAdd :input").not("#tabletoAdd :input[type='hidden']").not("#tabletoAdd :button").each(function(){
    formElements.push($(this).val());
});

var hidinput = document.getElementById('validationCustom36').value= formElements;

   console.log(hidinput);

   document.getElementById('formweekprg').submit();
    }


//=================================================================

function addLineInProgram() {

    var table = document.getElementById('tabletoAdd');
    

    
    var tr = document.createElement('tr');


    var th = document.createElement('th');
    th.innerHTML = "<select class='form-control' name='meal' id='validationCustom22' style='width:100px; padding:5px;'  > @foreach($meals as $meal) <option value='{{$meal->id}}' selected >{{$meal->mealName}}</option> @endforeach </select>";
    
    
    var td1 = document.createElement('td');
    td1.innerHTML = "<input type='number' name='saturday' value='' style='width: 50px' >";
    
    var td2 = document.createElement('td');
    td2.innerHTML = "<input type='number' name='saturday' value='' style='width: 50px' >";

    var td3 = document.createElement('td');
    td3.innerHTML = "<input type='number' name='saturday' value='' style='width: 50px' >";

    var td4 = document.createElement('td');
    td4.innerHTML = "<input type='number' name='saturday' value='' style='width: 50px' >";

    var td5 = document.createElement('td');
    td5.innerHTML = "<input type='number' name='saturday' value='' style='width: 50px' >";

    var td6 = document.createElement('td');
    td6.innerHTML = "<input type='number' name='saturday' value='' style='width: 50px' >";

    var td7 = document.createElement('td');
    td7.innerHTML = "<input type='number' name='saturday' value='' style='width: 50px' >";

    var td8 = document.createElement('td');
    
    td8.innerHTML = "<div style='width:80px'  > </div>";
  

    
    tr.appendChild(th);
    tr.appendChild(td1);
    tr.appendChild(td2);
    tr.appendChild(td3);
    tr.appendChild(td4);
    tr.appendChild(td5);
    tr.appendChild(td6);
    tr.appendChild(td7);
    tr.appendChild(td8);
    


    
    table.appendChild(tr);

    
    //hide button add

  document.getElementById("addbtnanis").style.display = 'none';

// display button confirm
document.getElementById("subitaddbtn").style.display = 'block';
    

    
    }

</script>

@endsection