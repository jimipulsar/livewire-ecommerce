<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
                <img src="{{(asset('/uploads/logo/logo2.jpg'))}}" style="height:80px;">
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>
