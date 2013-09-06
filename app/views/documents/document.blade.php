<li>

@if ($document['doc'] == '')
  doc
@else
  <a href="{{ $document['doc'] }}">doc</a>
@endif

 |

@if ($document['pdf'] == '')
  pdf
@else
  <a href="{{ $document['pdf'] }}">pdf</a>
@endif

 &raquo; {{ $document['title'] }}</li>