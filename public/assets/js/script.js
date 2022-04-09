let cpt=0;

function addInvoice(){
    cpt++;

    $('#invoiceLine').append(`
           <div class="col-12 row p-4 mt-3 mb-4"  style="background-color: #EEEEEE !important; border-radius: 15px" id='invoice${cpt}' >
 <div class="col-12">
            <label>Description</label><br>
            <textarea autocomplete="off" required min="1" type="number" name="description[]" class="form-control"></textarea>
        </div>
        <div class="col-6">
            <label>Quantity</label><br>
            <input autocomplete="off" required min="1" value="0"  onchange="calculTotal(cpt)" type="number" id="qte${cpt}" name="qte[]" class="form-control">
        </div>
        <div class="col-6">
            <label>Amount</label><br>
            <input autocomplete="off" onchange="calculTotal(cpt)" value="0" id="amount${cpt}" required min="1" type="number" name="amount[]" class="form-control">
        </div>
        <div class="col-6">
            <label>VAT amount</label><br>
            <input autocomplete="off" required min="1" value="0"  onchange="calculTotal(cpt)" id="vat${cpt}" type="number" name="vat[]" class="form-control">
        </div>
        <div class="col-6">
            <label>Total with VAT </label><br>
            <input autocomplete="off" readonly  onchange="calculTotal(${cpt})" id="total${cpt}" type="number" name="total[]" class="form-control">
        </div>
<div class="col-12 text-center mt-3"><button type="button" onclick="deleteInvoice(this)" class="btn btn-danger"><i class="fa fa-trash"></i> </button></div>
</div>
            `)
}

function deleteInvoice(cpt){

    cpt.parentNode.parentNode.remove()
    // $(`#invoice${cpt}`).remove()
}
function calculTotal(cpte){
    let amount= document.getElementById('amount'+cpte)
    let vat=document.getElementById('vat'+cpte)
    let qte=document.getElementById('qte'+cpte)
    console.log(amount,vat,qte)
    let total= (Number.parseInt(amount.value) + Number.parseInt(vat.value))*Number.parseInt(qte.value)
    $(`#total${cpt}`).val(total)
    console.log(total)
}
