<template>
    <div class="wrap" style="margin-top: -22px">
        <a href="/notifications">
           <div id="avatar-container">
               <img id="avatar" :src="userPicture" alt="">
           </div>

            <div id="content">
                <!--<a :href="postUrl">-->
                   <p class="message" v-if="typeOfNotfication">{{unread.data.user.name}} commented on your post.</p>
                    <p class="message" v-else>{{unread.data.user.name}} upvoted your post.</p>

                    <p class="timestamp">{{moment(unread.created_at).fromNow()}}</p>

            </div>

            <div  id="post-content">
                <img id="post" :src="imageLink"  alt="">
            </div>


            <hr>
            </a>
    </div>
</template>

<script>
    import moment from 'moment';
    export default {
        props:['unread'],
        data(){
            return{
                moment:moment,
                postUrl:'',
                imageLink:'',
                userPicture:'',
                typeNot:""
            }
        },
        mounted(){
            this.postUrl = "post/" +this.unread.data.slug;
            this.imageLink ='images/posts/' +this.unread.data.post.image;
            this.userPicture ='images/avatars/' +this.unread.data.user.avatar;
            this.typeNot = this.unread.data.type;
        },
       computed:{
            typeOfNotfication(){
                if(this.typeNot =='comment'){
                    return true;
                }else {
                    return false;
                }
            }
        }
    }
</script>

<style scoped>
    img{
        height: 40px;
        width: 40px;
        border: 0;
    }
    a{
        text-decoration: none;

    }
    .wrap:hover {
        background-color: lightcyan;
    }

    #avatar{
        margin-left: 10px;
        margin-top:10px;
        border-radius:50%;
        width: 40px;
        height: 40px;
    }

    #content{

        min-height: 40px;
        margin-left: 60px;
        margin-right: 40px;
        margin-top: -40px;
    }
    .message{
        line-height: 1.3em;
    }

    .timestamp{
        font-size: 11px;
        color: #999;
        line-height: 16px;
        margin-top: 5px;
        vertical-align: top;
    }

    #post{
        float:right;
        margin-top: -60px;
        margin-right: 5px;
    }



</style>