<x-layout>

<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

    @if(count($postings) == 0)
    <p>No listing found</p>
    @endif


    @foreach($postings as $posting) {{--listing here is carrying a Listing Model--}}
        <div class="my-4">
        <x-clothing-card :posting="$posting" />  {{-- :listing determine that on listing-card, we must use like $listing->title --}}
        </div>
    @endforeach
  </div>
     <div class="mt-6 mb-20 p-4">{{$postings->links()}}</div> {{--pagination display--}}

{{-- @endsection --}}
</x-layout>