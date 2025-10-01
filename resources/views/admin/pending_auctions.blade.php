@extends('admin.adminlayout')
@section('title') Pending Auctions @endsection
@section('content1')

<div class="container mt-5">
<h3>Pending Auction Requests</h3>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Product</th>
            <th>User ID</th>
            <th>Category</th>
            <th>Price</th>
            <th>Product PDF</th>
            <th>User Documents</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($products as $prod)
        <tr>
            <td>{{ $prod->product_name }}</td>
            <td>{{ $prod->user_id }}</td>
            <td>{{ $prod->category }}</td>
            <td>${{ $prod->product_price }}</td>

            {{-- Product PDF --}}
            <td>
                <a href="{{ route('admin.productPdf', $prod->id) }}" target="_blank"
                   class="btn btn-info btn-sm">View PDF</a>
            </td>

           {{-- User Documents --}}
           <td>
                {{-- NID --}}
                @if($prod->identity_card)
                    @php $nidExt = pathinfo($prod->identity_card, PATHINFO_EXTENSION); @endphp

                    @if(in_array(strtolower($nidExt), ['jpg','jpeg','png']))
                        <a href="{{ route('admin.generateDocumentPdf', ['type'=>'nid','user_id'=>$prod->user_id]) }}" 
                        target="_blank" class="btn btn-primary btn-sm">NID (PDF)</a>
                    @else
                        <a href="{{ asset('identity/'.$prod->identity_card) }}" target="_blank" class="btn btn-primary btn-sm">NID</a>
                    @endif
                @endif

                {{-- Invoice / Cash Memo --}}
                @if($prod->cash_memo)
                    @php $invoiceExt = pathinfo($prod->cash_memo, PATHINFO_EXTENSION); @endphp

                    @if(in_array(strtolower($invoiceExt), ['jpg','jpeg','png']))
                        <a href="{{ route('admin.generateDocumentPdf', ['type'=>'invoice','user_id'=>$prod->user_id]) }}" 
                        target="_blank" class="btn btn-secondary btn-sm">Invoice (PDF)</a>
                    @else
                        <a href="{{ asset('invoice/'.$prod->cash_memo) }}" target="_blank" class="btn btn-secondary btn-sm">Invoice</a>
                    @endif
                @endif

                {{-- Fallback --}}
                @unless($prod->identity_card || $prod->cash_memo)
                    <span class="text-muted">No Docs</span>
                @endunless
            </td>

            {{-- Action --}}
            <td>
                <form action="{{ route('admin.auctionAction', $prod->id) }}" method="POST" class="d-inline">
                    @csrf
                    <input type="hidden" name="action" value="approved">
                    <button class="btn btn-success btn-sm">Approve</button>
                </form>
                <form action="{{ route('admin.auctionAction', $prod->id) }}" method="POST" class="d-inline">
                    @csrf
                    <input type="hidden" name="action" value="rejected">
                    <button class="btn btn-danger btn-sm">Reject</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
@endsection
