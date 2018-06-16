<template>
    <div class="component-wrap">

        <!-- description -->
        <v-card class="pa-4">
            <v-layout row wrap class="md-layout">
                <v-flex xs12 sm6 md2 class="px-2">
                    <v-avatar size="140px" class="usr-avatar">
                        <img :src="items.photo" class="usr-img">
                    </v-avatar>
                </v-flex>
                <v-flex xs12 sm6 md10 class="px-2">
                    <h1 class="usr-name">{{items.fname}} {{items.lname}}</h1>
                    <p>{{items.job}}&nbsp;&nbsp;|&nbsp;&nbsp;{{items.company}}&nbsp;&nbsp;|&nbsp;&nbsp;{{items.department}}</p>
                    <br>
                    <p>
                        <v-icon>phone_iphone</v-icon>
                        914.330.214(cell)&nbsp;&nbsp;|&nbsp;&nbsp;914.241.524(home)&nbsp;&nbsp;|&nbsp;&nbsp;212.524.544(work)
                    </p>
                    
                    <p>
                        <v-icon>mail_outline</v-icon>
                        {{items.email}}
                    </p>
                    <br>
                    <p>
                        <v-icon>cake</v-icon>
                        03.11.2003&nbsp;&nbsp;
                        <v-icon>wc</v-icon>
                        Male&nbsp;&nbsp;
                        <v-icon>location_on</v-icon>
                        White Plains, NY
                    </p>
                    <p>
                        <v-icon>fa-facebook-f</v-icon>
                        &nbsp;&nbsp;&nbsp;
                        <v-icon>fa-twitter</v-icon>
                        &nbsp;&nbsp;&nbsp;
                        <v-icon>fa-dribbble</v-icon>
                    </p>
                </v-flex>  
            </v-layout>
        </v-card>
        <!-- /description -->

        <v-card class="pa-4">
            <div>
                <v-tabs 
                    slot="extension"
                    v-model="model"
                    color="white"
                    slider-color="white"
                    class ="md-tab">
                    <v-tab :key="1" :href="`#tab-1`" class="md-tabs">Profile Detials</v-tab>
                    <v-tab :key="2" :href="`#tab-2`" class="md-tabs">Groups+Attributes</v-tab>
                    <v-tab :key="3" :href="`#tab-3`" class="md-tabs">Documents</v-tab>
                    <v-tab :key="4" :href="`#tab-4`" class="md-tabs">Status+Activity</v-tab>
                </v-tabs>
                <v-card class="pt-3">
                    <v-layout row wrap >
                            <v-tabs-items v-model="model">
                                <v-tab-item
                                    :key="1"
                                    :id="`tab-1`"
                                >
                                    <v-layout row wrap>
                                        <v-tabs
                                            slot="extension"
                                            v-model="submodel"
                                            color="white"
                                            slider-color="cyan"
                                        >
                                            <v-tab :key="1" :href="`#subtab-1`" class="md-subtabs">coodinates</v-tab>
                                            <v-tab :key="2" :href="`#subtab-2`" class="md-subtabs">bios</v-tab>
                                            <v-tab :key="3" :href="`#subtab-3`" class="md-subtabs">additional contacts</v-tab>
                                            <v-tab :key="4" :href="`#subtab-4`" class="md-subtabs">education</v-tab>
                                        </v-tabs>
                                    </v-layout>
                                </v-tab-item>
                                <v-tab-item
                                    v-for="item in tabs"
                                    :key="item.key"
                                    :id="`${item.id}`"
                                > 
                                    <div class="pa-4" style="background-color:#dfe4e8">
                                        {{content_need}}
                                    </div>
                                </v-tab-item>
                        
                            </v-tabs-items>
                    </v-layout>
                </v-card>
                <v-layout v-if="model === 'tab-1'" row wrap style="background-color:#dfe4e8" class="pa-4">
                    <v-tabs-items v-model="submodel" style="width:100%">
                        <v-tab-item
                            :key="1"
                            :id="`subtab-1`"
                        >
                            <v-layout row wrap>
                                <v-flex xs12 sm6 md4 class="px-3"
                                    v-for="item in coordinates"
                                    :key = "item.key"
                                >
                                    <v-card>
                                        <v-card-title>
                                            <div class="subitem-title">
                                                <v-icon>location_on</v-icon>
                                                <span><strong>{{item.title}}</strong></span>
                                            </div>
                                            <v-spacer></v-spacer>
                                            <v-radio-group v-model="radiogroup" hide-details>
                                                <v-radio :key="item.key" :value="item.key"></v-radio>
                                            </v-radio-group>
                                            
                                        </v-card-title>
                                        <v-card-text>
                                            <p>{{item.addr}}</p>
                                            <p>{{item.apartment}}</p>
                                            <p>{{item.CSZ}}</p>
                                        </v-card-text>
                                    </v-card>
                                </v-flex>
                            </v-layout>
                        </v-tab-item>
                        <v-tab-item
                            v-for="item in subtabs"
                            :key="item.key"
                            :id="`${item.id}`"
                        > 
                            {{content_need}}
                        </v-tab-item>
                
                    </v-tabs-items>
                </v-layout>
            </div>
        </v-card>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                model: 'tab-1',
                submodel: 'subtab-1',
                search: '',
                tabs: [
                    {key:2, id:'tab-2'},
                    {key:3, id:'tab-3'},
                    {key:4, id:'tab-4'},
                ],
                radiogroup: 1,
                subtabs: [
                    {key:2, id:'subtab-2'},
                    {key:3, id:'subtab-3'},
                    {key:4, id:'subtab-4'},
                ],
                coordinates: [
                    {key:1, title: 'Home Address', addr: '290 West 38th Street', apartment: 'Apt 34B', CSZ: 'New York, NY 1100-2239'},
                    {key:2, title: 'Orgnization Address', addr: '290 West 38th Street', apartment: 'Apt 34B', CSZ: 'New York, NY 1100-2239'},
                    {key:3, title: 'Alternative Address', addr: '290 West 38th Street', apartment: 'Apt 34B', CSZ: 'New York, NY 1100-2239'},
                ],
                content_need: "Content need",
                selected: [],
                items: {photo: '../img/avtar1.jpg', fname: 'Tammy', lname: 'Amerola', job: 'Business Services Sales Representative', company: 'OrgCentral', department: 'Sales', email: 'test@gmail.com', status:'Active'},
            }
        },
        mounted() {
            const self = this;

            self.$store.commit('setBreadcrumbs',[
                {label:'Module',name:'', disabled: false},
                {label:'Contacts',name:'', disabled: true},
            ]);
        },
        computed: {
            pages () {
                if (this.pagination.rowsPerPage == null ||
                this.pagination.totalItems == null
                ) return 0

                return Math.ceil(this.pagination.totalItems / this.pagination.rowsPerPage)
            }
        }

    }
</script>