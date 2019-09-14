$(document).ready(function() {
	$('#deactivate').click(function(event){
		var id=$(this).find('#id').val();	
		console.log(id);				
		$.get('admin-panel/user/deactivate',
				{
				 'id':id 
			     },
			     function(data){
			     	console.log(data);
			     	$('#users-table').load(location.href + ' #users-table');
			     }
			);
		
		
	});
	$(".image").change(function () {

            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.image-preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);
            }

        });
});