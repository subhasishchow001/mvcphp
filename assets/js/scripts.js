/*!
    * Start Bootstrap - SB Admin v7.0.7 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2023 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    // 
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}

$(document).ready(function() {
     $('#studenttable').DataTable({
        'serverSide':false,
        'processing':true,
        'paging':true,
        'order':[],
     });

  $("#AttorneyEmpresa").change (function () {  
        var selectedCountry = $(this).children("option:selected").val();  

        var components= selectedCountry.split(' ');
        var numericValue = parseInt(components[0], 10);
        var name = components[1];
        var newname= components.slice(1,3).join('');
        var degree = components.slice(3).join('');
        var imagename= newname+degree;

      //Updating to field
       $('#numericValueInput').attr('value',numericValue);
       $('#studentname').val(name);
       $('#studentimage1').attr('src','uploads/'+imagename);

    });  
// /*********Print********/
// });
function printPage() {
    window.print();
}






