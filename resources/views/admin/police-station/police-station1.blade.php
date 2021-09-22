@extends('admin.layout.master')
@section('content')

<select name="division" id="বিভাগ" class="form-control বিভাগ input-lg">
    <option selected disabled>বিভাগ নির্বাচন করুন</option>
   </select>
   <br />
   <select name="district" id="জেলা" class="form-control জেলা input-lg">
    <option selected disabled>জেলা নির্বাচন করুন</option>
   </select>
   <br />
   <select name="upazila" id="উপজেলা" class="form-control উপজেলা input-lg">
    <option selected disabled>উপজেলা নির্বাচন করুন</option>
</select>

<script>
    $(document).ready(function(){

     load_json_data('বিভাগ');

     function load_json_data(id, parent_id)
     {
      var html_code = '';

      $.getJSON('categories.json', function(data){

       html_code = '<option selected disabled>'+id+ ' নির্বাচন করুন</option>';

       $.each(data, function(key, value){

        if(id == 'বিভাগ')
        {
            // console.log(value.parent_id)
         if(value.parent_id == null)
         {

          html_code += '<option  value="'+value.id+'">'+value.name+'</option>';
          //console.log(value.name)
         }
        }
        else
        {
         if(value.parent_id == parent_id)
         {
          html_code += '<option value="'+value.id+'">'+value.name+'</option>';
          //console.log(value.name)
         }
        }
       });
       $('#'+id).html(html_code);
       //console.log(html_code)
      });

     }

     $(document).on('change', '#বিভাগ', function(){
      var division = $(this).val();
      if(division != '')
      {
       load_json_data('জেলা', division);
      }
      else
      {
       $('#জেলা').html('<option selected disabled >জেলা নির্বাচন করুন</option>');
       $('#উপজেলা').html('<option selected disabled >উপজেলা নির্বাচন করুন</option>');
      }
     });
     $(document).on('change', '#জেলা', function(){
      var upazila = $(this).val();
      if(upazila != '')
      {
       load_json_data('উপজেলা', upazila);
      }
      else
      {
       $('#উপজেলা').html('<option selected disabled>উপজেলা নির্বাচন করুন</option>');
      }
     });
    });
    </script>
@endsection
