<table class="table table-border">
    <tr>
        <th>Nama</th>
        <th>:</th>
        <th>{{$data->nama}}</th>
    </tr>
    <tr>
        <th>Nilai IPA</th>
        <th>:</th>
        <th>{{$data->details[count($data->details)-1]->ipa}}</th>
    </tr>
    <tr>
        <th>Nilai IPS</th>
        <th>:</th>
        <th>{{$data->details[count($data->details)-1]->ips}}</th>
    </tr>
    <tr>
        <th >Nilai Matematika</th>
        <th>:</th>
        <th>{{$data->details[count($data->details)-1]->matematika}}</th>
    </tr>
    <tr>
        <th>Nilai Total</th>
        <th>:</th>
        <th>{{$data->nilai_total}}</th>
    </tr>
</table>
<div class="group-button">
    <a href="{{ route('studentdetail.edit',$data->details[count($data->details)-1]->id) }}" class="btn btn-success btn-block">Edit</a>
</div>