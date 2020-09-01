<template>
  <v-app>
    <v-card>

      <v-card-title>
        Songs
        <v-spacer></v-spacer>
        <v-text-field
          v-model="search"
          append-icon="mdi-magnify"
          label="Search"
          single-line
          hide-details
        ></v-text-field>
      </v-card-title>
      <v-data-table
        :headers="headers"
        :items="songs"
        item-key="id"
        :search="search"
        class="elevation-1"
      >
        <template v-slot:item="{ item }">
          <tr  @click="download(item.id)">
            <td>{{item.title}}</td>
            <td>{{item.track_number}}</td>
            <td>{{item.duration}}</td>
            <td>{{item.album.title}}</td>
            <td>{{item.album.artist.name}}</td>
          </tr>
        </template>
      </v-data-table>
    </v-card>
  </v-app>
</template>

<script>
export default {
  props: ["songs"],
  data() {
    return {
      search: "",

      headers: [
        {
          text: "Titel",
          align: "start",
          value: "title"
        },
        {
          text: "Track Nummer",
          value: "track_number"
        },
        {
          text: "Tijdsduur",
          value: "duration"
        },
        {
          text: "Album",
          value: "album.title"
        },
        {
          text: "Artiest",
          value: "album.artist.name"
        },

      ]
    };
    
    
  },
   methods: {
    download(id) {
      window.location.href = "download/" + id;
    }
  },
 
};
</script>