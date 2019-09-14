@if (session('success'))

    <script>
        Swal.fire({
				  title: '{{session("success")}}',
				  text: "",
				  type: 'success',
				  showCancelButton: false,
				  confirmButtonColor: '#3085d6',
				  confirmButtonText: 'شكرا'
				})
    </script>

@endif