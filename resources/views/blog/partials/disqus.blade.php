<div id="disqus_thread"></div>
<script>
    var disqus_config = function () {
        this.page.url = '{{ config('app.url') }}/blog/{{ $post->slug }}';
        this.page.identifier = 'post-{{ $post->slug }}';
    };
    (function () { // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = 'https://laravelxue-yuan.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>
    请启用 JavaScript 查看 <a href="https://disqus.com/?ref_noscript">Disqus</a> 驱动的评论框。
</noscript>
