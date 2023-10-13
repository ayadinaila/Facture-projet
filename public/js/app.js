

    let btn = document.querySelector(".bx-menu");
    let sidebar=document.querySelector(".sidebar");
    let logo = document.querySelector(".logo-name");
    let tootlip = document.querySelectorAll(".tootlip");
    let links = document.querySelectorAll(".links");
    let profile=document.querySelector(".profile-detail");
    let logout=document.querySelector(".bx-log-out");
    let professionals=document.getElementById("add-client-professional");
    let particulars=document.getElementById("add-client-particular");
    let inputProfessionals=document.querySelectorAll(".input-professionals");
    let inputParticulars=document.querySelectorAll(".input-particulars");

    //get current url
    // let navlinks=document.querySelectorAll(".links")
    // navlinks.forEach(element=>{
    //    if(element.getAttribute(href)==(window.location.href)){
    //      element.classList.add('active');
    //    } });



    // function getCurrentURL() {
    //     console.log (window.location.href);
    //     var href=document.getElementById("home").href;
    //     var a=document.getElementById("home");
    //     if(href==window.location.href){
    //         a.classList.add("active");
    //     }
    // }


//jquery

// $('.facture').hover(function(){
//     $('h2').hide();
// }



    // .clone().appendTo(".str").find("input").val("");

    function imprimer(document) {
        var printContents = document.getElementById('document').innerHTML;
     var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;
     window.print();
     document.body.innerHTML = originalContents;
     }

function rejete(url){
    Swal.fire({
        title: 'are you sure?',
        text: "You won't be able to delete or modify!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire(
            'rejetée!',
            'Your file has been dismiss.',
            'success'
          )
          window.location.href =url;
        }
      })
      document.getElementId('approuve').style.display="none";
      document.getElementId('rejeté').style.display="none";
      document.getElementId('imprimer').style.display="block";
}

function approuve(url){
    Swal.fire({
        title: 'are you sure?',
        text: "You won't be able to delete or modify!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire(
            'approuvée!',
            'Your file has been approuved.',
            'success'
          )
          window.location.href =url;
        }
      document.getElementById('approuve').style.display="none";
      document.getElementById('rejeté').style.display="none";
      document.getElementById('imprimer').style.display="block";
      })



}

function supprimer(id){
    Swal.fire({
        title: 'are you sure? you want to delete it',

        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
      }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("del"+id).submit();
          Swal.fire(
            'deleted!',
            'Your file has been deleted.',
            'success'
          )
          window.location.href =url;
        }
      })



}

function changestatutadd(){
    var statut=document.getElementById('statut-facture');
    var form=document.getElementById('addfacture');
    statut.value="Enregistrer";

    Swal.fire({
        title: 'are you sure?',
        text: "You won't be able to return back!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
      }).then((result) => {
        if (result.isConfirmed) {

          Swal.fire(
            'Enregistrer!',
            'Your file has been saved.',
            'success'
          )
        //   window.location.href =url;
        statut.value="Enregistrer";
        form.submit();
        }

      })





}

function changestatut(){
    var statut=document.getElementById('statut-facture');
    var form=document.getElementById('updatefacture');
    statut.type="text";
    statut.value="Enregistrer";

    Swal.fire({
        title: 'are you sure?',
        text: "You won't be able to return back!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
      }).then((result) => {
        if (result.isConfirmed) {

          Swal.fire(
            'Modified!',
            'Your file has been modified.',
            'success'
          )
        //   window.location.href =url;
        form.submit();
        }

      })



}

function modifier(id){
    var form=document.getElementById(id);
    Swal.fire({
        title: 'are you sure?',
        text: "You won't be able to return back!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
      }).then((result) => {
        if (result.isConfirmed) {

          Swal.fire(
            'modified!',
            'Your file has been modified.',
            'success'
          )
          form.submit();
        //   window.location.href =url;
        }
      })
}


//cacule totale facture
$(".product-button").click(function(){
  $("#partie_produit").clone('false').appendTo("#main-produit").find("input").val("");

});

    $('.select-produit').on('change',function(){
        var quantite=$(this).next('input').val();

        var prix= $('.select-produit').find(':selected').data('price');
        // console.log(prix*quantite);
        var prixtotale=(prix*quantite);
        $(this).next('input').next('input').val(prixtotale);
        getTotal();

    });



    $('.quantite').bind('keyup mouseup',function(){
            var prix= ($(this).prev()).find(':selected').data('price');
            var prixtotale=(prix*$(this).val());
            // console.log(prix);
            $(this).next('input').val(prixtotale);

            getTotal();


    });





    function getTotal() {
        var sumPrice = 0;
        var sumService = 0;
        var sumRemise = 0;
        var sum = 0;

        $('.input-produit-prix').each(function(){
            sumPrice += parseFloat($(this).val());  // Or this.innerHTML, this.innerText
        });


        $('.input-produit-service').each(function(){

                    if($(this).val() != ""){
                        sumService += parseFloat($(this).val());
                }
        });

        $('.input-produit-remise').each(function(){

                if($(this).val() != ""){
                    sumRemise += parseFloat($(this).val());
                        }
        });
        sum = parseFloat(sumPrice + sumService - sumRemise);
        $('.prixfinal').val(Math.abs(sum));
        var totaleTva=sum*0.19;
        $('.prixtva').val(Math.abs(totaleTva));
        var totaleTtc= totaleTva+sum;
        $('.prixttc').val(Math.abs(totaleTtc));
    }



    document.querySelector(".logo-content").addEventListener("click", function(){
        console.log(tootlip);
        if(sidebar.offsetWidth == 65){
            sidebar.style.width = "200px";
            logo.style.display="block";
            logo.style.opacity="1";
            btn.style.left="90%";
            tootlip.forEach(element => {
                element.style.display="none";
            });
            links.forEach(element => {
                element.style.display="block";
            });
            profile.style.opacity="1";
            logout.style.opacity="1";
            logout.style.left="88%";

        }

        else{
            sidebar.style.width = "65px";
            logo.style.opacity="0";
            btn.style.left="48%";
            tootlip.forEach(element => {
                element.style.display="block";
            });
            links.forEach(element => {
                element.style.display="none";
            });
            logout.style.opacity="1";
            profile.style.opacity="0";
            logout.style.left="45%";

    }
});

//show and hide form of client

function Showhide(x)
{
       if (x == 0) {
        inputParticulars.forEach(element => {
            element.removeAttribute('required');
            // element.setAttribute("disabled","true");
        });

        document.getElementById('add-client-professional').style.display="block";
        document.getElementById('add-client-particular').style.display="none";



       }
       else{
        inputProfessionals.forEach(element => {
            element.removeAttribute('required');
            // element.setAttribute("disabled","true");
        });

        document.getElementById('add-client-particular').style.display="block";
        document.getElementById('add-client-professional').style.display="none";


       }
       return;


}

function showpassword() {
    var x = document.getElementById("password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }


  }

  function shownewpassword() {
  var y = document.getElementById("newpassword");
  if (y.type === "password") {
    y.type = "text";
  } else {
    y.type = "password";
  }
  }

  function showconfirmpassword() {
  var z = document.getElementById("confirmpassword");
  if (z.type === "password") {
    z.type = "text";
  } else {
    z.type = "password";
  }
  }

//   function editprofile(){
//      var y = document.getElementById("card-content").style.display;
//     if( y !="none"){
//         y="none";
//     }
//    else{
//      y="block";
//    }
//   }

const targetDiv = document.getElementById("card-content");
const bttn = document.getElementById("editbutton");
bttn.onclick = function () {
  if (targetDiv.style.display !== "none") {
    targetDiv.style.display = "none";
  } else {
    targetDiv.style.display = "block";
  }
};

// function verifyproduct(){
//     // var ids = $('select[name="produit_facture[]"]');

//     var  val1= $("select[name=\'produit_facture[]\']").map(function() {
//         return $(this).val();
//     }).toArray();

//     // console.log($("select[name=\'produit_facture[]\']").children().last())

//     // const productselected=$("select[name=\'produit_facture[]\'] option:selected").children().last().val();
//     var productselected=$("select[name=\'produit_facture[]\'] ").prop('selectedIndex')
//     console.log(productselected);

//     if(val1.length > 1 && val1.includes(productselected)){
//         // document.getElementById("produit-facture").value = "";

//         // $("select[name=\'produit_facture[]\']").children().last().prop('selectedIndex',0);
//               Swal.fire(
//                 'warnning!',
//                 'Your can not choose the same product',
//                 'warning'
//               )


//             //   window.location.href =url;

//     }
// }

function deleteproduct(){

    // $('#main-produit').remove();
    $(document).ready(function(){
        $('.product-button-delete').click(function(){
            // Swal.fire(
            //                     'warning!',
            //                     'Your are going to remove your products',
            //                     'warning'
            //                   )
            Swal.fire({
                title: 'are you sure?',
                text: "You won't be able to return back!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
              }).then((result) => {
                if (result.isConfirmed) {
                    $('#main-produit').remove();
                  Swal.fire(
                    'removed!',
                    'Your products has been removed.',
                    'success'
                  )
                  form.submit();
                //   window.location.href =url;
                }
              })

        })
    })
}


