<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Example Component</div>

          <div class="card-body">
            <ul class="list-group" v-if="users.length">
              <li v-for="user in users" :key="user.id">{{ user.name }}</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      users: []
    };
  },
  async mounted() {
    await axios.get("send");
    Echo.channel("notification").listen("NewUserRegister", e => {
      this.users.push(e.user);
    });
  }
};
</script>
