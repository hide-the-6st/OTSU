<template>
    <div>
      <button type="button" class="btn btn-primary" @click="submit(postId)">お疲れ様です！</button>
    </div>
</template>

<script>
    export default{
        props: ['postId'],

        methods:{
          submit(postId){
            let url = `/api/posts/${postId}/otsu`

            axios.post(url)
            .then(response => {

            })
            .catch(error => {
              alert(error)
            });
          }
        }

    }
</script>
