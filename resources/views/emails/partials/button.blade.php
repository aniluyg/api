<?phps
$url .= '?utm_source=transactional&utm_medium=email&utm_campaign=action_button';
?>
<a href="{{ $url }}" style="display: inline-block; padding: 10px 20px; line-height: 20px; background-color: #44a1e0; color: #fff; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; text-decoration: none;">
  {!! $text !!}
</a>
