<template>
    <div>
      <button v-if="!otsud" type="button" class="btn btn-primary" @click="otsu(postId)">お疲れ様です！{{ otsuCount }}</button>
      <button v-else type="button" class="btn btn-primary" @click="unotsu(postId)">お疲れ様です！{{ otsuCount }}</button>
    </div>
</template>

<script>
    export default{
        props: ['postId', 'userId', 'defaultOtsu', 'defaultCount'],
        data(){
          return {
            otsud: false,
            otsuCount: 0,
          };
        },
        created(){
          this.otsud = this.defaultOtsu
          this.otsuCount = this.defaultCount
        },

        methods:{
          otsu(postId){
            let url = `/api/posts/${postId}/otsu`

            axios.post(url, {
              user_id: this.userId
            })
            .then(response => {
              this.otsud = true
              this.otsuCount = response.data.otsuCount
            })
            .catch(error => {
              alert(error)
            });
          },
          unotsu(postId){
            let url = `/api/posts/${postId}/unotsu`

            axios.post(url, {
              user_id: this.userId
            })
            .then(response => {
              this.otsud = false
              this.otsuCount = response.data.otsuCount
            })
            .catch(error => {
              alert(error)
            });
          }
        }

    }
</script>
