<template>
    <div>
        <button v-text="buttonText" @click="followUser" class="ml-2 btn btn-primary font-weight-bold text-white" style="font-size: 0.4em;"></button>
    </div>
</template>

<script>
    export default {
        props : ['userId', 'follows'],
        mounted() {
            console.log('Component mounted.')
        },
        data: function(){
            return {
                status: this.follows
            }
        },
        methods: {
            followUser() {
                axios.post('/follow/' + this.userId)
                    .then(response => {
                        this.status = !this.status;
                        console.log(response.data);
                    })
                    .catch(errors => {
                        if(errors.response.status == 401){
                            window.location = '/login';
                        }
                    });
            }
        },

        computed: {
            buttonText(){
                return (this.status ? 'Unfollow' : 'Follow');
            }
        }
    }
</script>
