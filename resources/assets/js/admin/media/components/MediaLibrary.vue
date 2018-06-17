<template>
    <div class="component-wrap">
        <v-card class="pt-3">
            <v-layout row wrap>
                <v-flex xs12 sm12 class="px-3">
                    <h1>Media Library</h1>
                    <p>Instructional text about this module</p>
                </v-flex>
            </v-layout>
        </v-card>
        <v-layout row wrap class="pa-3">
            <v-flex xs12 sm6 md3 class="pa-2">
                    <h3>Albums</h3>
                    <div v-for="item in albums" :key="item">
                        <v-btn flat>
                            <v-icon>fa-folder-o</v-icon>
                            <span style="color:#333">&nbsp;&nbsp;{{item.name}}</span>
                        </v-btn>
                    </div>
                    <v-btn flat color="#00ccff">+ Add New Album</v-btn>
                    <h3>Content Types</h3>
                    <div v-for="item in content_types" :key="item">
                        <v-btn flat>
                            <span style="color:#333">{{item.type}}&nbsp;({{item.count}})</span>
                        </v-btn>
                    </div>
                    <v-btn flat color="#00ccff">+ Add New Album</v-btn>
            </v-flex>
            <v-flex xs12 sm6 md9 class="pa-2">
                <v-layout row wrap>
                    <v-flex sm4 md3 class="pa-3" v-for="item in md_lib_data" :key="item">
                        <v-card class="pa-2">
                            <v-card-media :src="item.image" height="140px">
                            </v-card-media>
                            <v-card-title primary-title>
                                <h4>{{item.name}}</h4>
                                <v-spacer></v-spacer>
                                <v-btn icon class="md-card-btn">
                                    <v-icon >fa-pencil</v-icon>
                                </v-btn>
                                <v-btn icon class="md-card-btn">
                                    <v-icon >fa-trash</v-icon>
                                </v-btn>
                            </v-card-title>
                            <v-card-text>
                                <span style="color:#ccc">{{item.created_date}}</span>
                            </v-card-text>
                        </v-card>
                    </v-flex>
                    <v-btn block color="white">
                        <v-icon color="#333">fa-bars</v-icon>
                        <span style="color:#333">&nbsp;Load More Images</span>
                    </v-btn>
                </v-layout>
            </v-flex>
        </v-layout>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                albums: [
                    {name:'General'},
                    {name:'Office'},
                    {name:'Las Vegas'},
                    {name:'Thailand'},
                    {name:'Nature'},
                ],
                content_types: [
                    {type: 'Billboard', count:64},
                    {type: 'Protrait', count:8},
                    {type: 'Sidebar', count:32},
                    {type: 'Other', count:15},
                ],
                md_lib_data: [
                    {image: '../img/avtar1.jpg', name: 'Avatrar01', description: 'This is test img', created_date: '01 June 2018'},
                    {image: '../img/avtar2.jpg', name: 'Avatrar02', description: 'This is test img', created_date: '24 May 2018'},
                    {image: '../img/avtar3.jpg', name: 'Avatrar03', description: 'This is test img', created_date: '18 May 2018'},
                    {image: '../img/avtar4.jpg', name: 'Avatrar04', description: 'This is test img', created_date: '12 May 2018'},
                    {image: '../img/avtar5.jpg', name: 'Avatrar05', description: 'This is test img', created_date: '13 April 2018'},
                    {image: '../img/avtar6.jpg', name: 'Avatrar06', description: 'This is test img', created_date: '01 April 2018'},
                    {image: '../img/woman_avtar1.jpg', name: 'Avatrar07', description: 'This is test img', created_date: '21 March 2018'},
                    {image: '../img/woman_avtar2.jpg', name: 'Avatrar08', description: 'This is test img', created_date: '17 March 2018'},
                    {image: '../img/woman_avtar3.jpg', name: 'Avatrar09', description: 'This is test img', created_date: '08 March 2018'},
                    {image: '../img/woman_avtar4.jpg', name: 'Avatrar10', description: 'This is test img', created_date: '19 Frebrary 2018'},
                    {image: '../img/woman_avtar5.jpg', name: 'Avatrar11', description: 'This is test img', created_date: '04 Frebrary 2018'},
                    {image: '../img/woman_avtar6.jpg', name: 'Avatrar12', description: 'This is test img', created_date: '17 January 2018'},
                ],
            }
        },
        mounted() {
            const self = this;

            self.$store.commit('setBreadcrumbs',[
                {label:'Media Library',name:'', disabled: true},
            ]);
        },
    }
</script>