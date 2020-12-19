@extends('layouts.main')

@section('content')

</style>
<div class="card">
  <div class="card-header">
    <h4>All Companies</h4>
  </div>
  <div class="card-body">
      <table class="table" cellpadding="10" >
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Code</th>
            <th>Address</th>
            <th>City</th>
            <th>Country</th>
        </tr>
        <form action="{{ route('companies.add') }}" method="POST">
            @csrf
            <tr>
                <td colspan="2"><input class="form-control" type="text" name="name" placeholder="Company Name"></td>
                <td><input class="form-control" type="number" step="any" name="code" placeholder="Company Code"></td>
                <td><input class="form-control" type="text" name="address" placeholder="Company Address"></td>
                <td><input class="form-control" type="text" name="city" placeholder="Company City"></td>
                <td><input class="form-control" type="text" name="country" placeholder="Company Country"></td>
                <td><button class="btn btn-success" type="submit">Add</button</td>
            </tr>
        </form>

        @foreach($companies as $cs)
            <tr>
                <td>{{ $cs->id }}</td>
                <td>{{ $cs->name }}</td>
                <td>{{ $cs->code }}</td>
                <td>{{ $cs->address }}</td>
                <td>{{ $cs->city }}</td>
                <td>{{ $cs->country }}</td>
                <td>
                    <form action="{{ route('companies.delete') }}" method="post">
                        @csrf
                        <input type="hidden" name="company_id" value="{{ $cs->id }}" />
                        <button class="btn btn-danger">Delete</button>
                    </form>
                    <a href="{{ route('companies.edit', ['id' => $cs->id]) }}" class="btn btn-primary">Edit</a>
                </td>
            </tr>
        @endforeach

      </table>
  </div>

  
</div>
  
@endsection