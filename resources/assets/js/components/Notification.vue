<template>
    <li class="dropdown" id="markasread" @click="markNotificationAsRead()">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            <i class="fa fa-bell" style="font-size: 18px;"></i>
            <div id="bell" v-if="unreadNotifications.length>0">
                <span class="badge">
                    {{unreadNotifications.length}}
                </span>
            </div>
        </a>
        <ul class="dropdown-menu"  role="menu">
            <div class="title">
                <h5 id="activities"><strong>Activities</strong></h5>
            </div>
            <hr>
            <div class="notfication" style= "margin-top: -22px">
                <li id="notification_scroll">
                    <div v-if="unreadNotifications.length>0">
                        <notification-item v-for="unread in unreadNotifications"  :unread="unread" :key="unread.id"></notification-item>
                    </div>
                    <div id="message" v-else>
                        <h4> You don't have any notification yet.</h4>
                    </div>


                </li>
            </div>

            <hr style="margin-top:0px;margin-bottom: 10px;">
            <a href="/notifications" style="display: block; text-align: center; margin-top: -6px;">See all</a>
        </ul>
    </li>
</template>

<script>
    import NotificationItem from './NotificationItem';
    export default {
        props:['unreads','userid'],
        components:{NotificationItem},
        data(){
          return {
              unreadNotifications: this.unreads
          }
        },
        methods:{
            markNotificationAsRead(){
                if(this.unreadNotifications.length){
                    axios.get('/markAsRead');
                }
            }
        },

        mounted() {
            Echo.private('App.User.' +this.userid)
                .notification((notification) => {
                let newUnreadNotifications = {data:{post:notification.post,user:notification.user}};
                this.unreads.unshift(newUnreadNotifications);
                });
        },

    }
</script>

<style scoped>
    .badge{
        margin-top:-68px;
        margin-left: 12px;
        background-color: red;
    }

    #bell{
        margin-bottom: -22px;
    }

    #message{
        margin-top: 100px;
        margin-left: 15px;
    }
    #message h1{
        font-weight: 700;
    }
    .dropdown-menu{
        width: 320px;
        height: 360px;
        margin-top: -5px;
    }
    #activities{
        margin-top: 1px;
        margin-bottom: -15px;
        margin-left: 5px;
    }

    #notification_scroll{
        height: 300px;
        overflow-y:auto;
        padding-top: 22px;
    }
</style>
