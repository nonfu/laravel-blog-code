<p>
    收到来自博客网站联系表单的新消息。
</p>
<p>
    下面是消息明细:
</p>
<ul>
    <li>姓名: <strong>{{ $data['name'] }}</strong></li>
    <li>邮箱: <strong>{{ $data['email'] }}</strong></li>
    <li>手机: <strong>{{ $data['phone'] }}</strong></li>
</ul>
<hr>
<p>
    @foreach ($data['messageLines'] as $messageLine)
        {{ $messageLine }}<br>
    @endforeach
</p>
<hr>
