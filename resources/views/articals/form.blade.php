{!! Form::group_text('name','作品名','请输入作品名') !!}
{!! Form::form_select('tag_id','标签名',$tags) !!}
{!! Form::form_select('category_id','分类名',$cates) !!}
@include('base.ueditor',['multi'=>true]);
