<script type="text/javascript">
@if(session()->has('flash_message'))
      swal({   
      	title: "{{ session('flash_message.title') }}",   
      	text: "{{ session('flash_message.message') }}",   
      	type: '{{ session('flash_message.level') }}',
      	timer: 4000,   
      	showConfirmButtonText: false 
      });
  @endif
 </script>
@if(session()->has('flash_warning'))
<script type="text/javascript">
      swal({   
      	title: "{{ session('flash_message.title') }}",   
      	text: "{{ session('flash_message.message') }}",   
      	type: '{{ session('flash_message.level') }}',  
      	showConfirmButtonText: true,
      	showCancelButton: true,
      	closeOnConfirm: false
      },
      function() {
  swal(
    'Deleted!',
    'Your file has been deleted.',
    'success'
  );
});
 </script>
@endif