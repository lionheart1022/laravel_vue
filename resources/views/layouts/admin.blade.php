<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

    <!-- app js values -->
    <script type="application/javascript">
        var LSK_APP = {};
        LSK_APP.APP_URL = '{{env('APP_URL')}}';
    </script>
</head>
<body>
<div id="admin">

    <template>
        <v-app id="inspire" dark>
            <v-navigation-drawer
                    clipped
                    fixed
                    stateless 
                    hide-overlay
                    :mini-variant.sync="mini"
                    v-model="drawer"
                    width="260"
                    mini-variant-width="54"
                    app>
                <v-list dense>

                    @foreach($nav as $n)
                        @if($n->navType==\App\Components\Core\Menu\MenuItem::$NAV_TYPE_NAV)
                            <router-link :to="{name:'{{$n->routeName}}'}" class="router-link">
                                <v-list-tile>
                                    <v-list-tile-action>
                                        <v-icon>{{$n->icon}}</v-icon>
                                    </v-list-tile-action>
                                    <v-list-tile-content>
                                        <v-list-tile-title>
                                            {{$n->label}}
                                        </v-list-tile-title>
                                    </v-list-tile-content>
                                </v-list-tile>
                            </router-link>
                        @else
                            <v-divider></v-divider>
                        @endif
                    @endforeach

                    <a class="router-link">
                        <v-list-tile @click="clickLogout('{{route('logout')}}','{{url('/')}}')">
                            <v-list-tile-action>
                                <v-icon>directions_walk</v-icon>
                            </v-list-tile-action>
                            <v-list-tile-content>
                                <v-list-tile-title>Logout</v-list-tile-title>
                            </v-list-tile-content>
                        </v-list-tile>
                    </a>

                </v-list>
            </v-navigation-drawer>
            <v-toolbar app fixed clipped-left height="50">
                <img v-if="mini" src="{{asset('img/logo_icon_light.png')}}" style="background-color: #263238; padding: 8px 11px; margin-left: 0px;">
                <img v-if="!mini" src="{{asset('img/logo_light.png')}}" style="margin-left: 0px;">
                <v-toolbar-side-icon @click.stop="mini = !mini"></v-toolbar-side-icon>
                <v-menu offset-y position-y>
                    <v-btn icon slot="activator">
                        <v-badge overlap color="warning">
                            <span slot="badge">2</span>
                            <v-icon>description</v-icon>
                        </v-badge>
                    </v-btn>
                    <v-list>
                        <v-list-tile>
                            <v-list-tile-action>
                                <v-icon>person_add</v-icon>
                            </v-list-tile-action>
                            <v-list-tile-content>
                                <v-list-tile-title>My profile</v-list-tile-title>
                            </v-list-tile-content>
                        </v-list-tile>
                        <v-list-tile>
                            <v-list-tile-action>
                                <v-icon>forum</v-icon>
                            </v-list-tile-action>
                            <v-list-tile-content>
                                <v-list-tile-title>
                                    <!-- <v-badge color="success">
                                        <span slot="badge">58</span>
                                        <span>Messages</span>
                                    </v-badge> -->
                                    Messages
                                </v-list-tile-title>
                            </v-list-tile-content>
                        </v-list-tile>
                        <v-divider class="my-3" style="background-color: darkgrey;"></v-divider>
                        <v-list-tile>
                            <v-list-tile-action>
                                <v-icon>settings</v-icon>
                            </v-list-tile-action>
                            <v-list-tile-content>
                                <v-list-tile-title>Account settings</v-list-tile-title>
                            </v-list-tile-content>
                        </v-list-tile>
                        <v-list-tile>
                            <v-list-tile-action>
                                <v-icon>power_settings_new</v-icon>
                            </v-list-tile-action>
                            <v-list-tile-content>
                                <v-list-tile-title>Logout</v-list-tile-title>
                            </v-list-tile-content>
                        </v-list-tile>
                    </v-list>
                </v-menu>
                
                <v-spacer></v-spacer>
                <v-menu offset-y position-y>
                    <v-btn icon slot="activator">
                        <v-badge overlap color="warning">
                            <span slot="badge">9</span>
                            <v-icon>forum</v-icon>
                        </v-badge>
                    </v-btn>
                    <v-list subheader>
                        <v-subheader>
                            <span>MY RECENT ACTIVITY</span>
                            <v-spacer></v-spacer>
                            <v-btn icon>
                                <v-icon>refresh</v-icon>
                            </v-btn>
                        </v-subheader>
                        <v-list-tile>
                            <v-list-tile-action>
                                <v-icon>person_add</v-icon>
                            </v-list-tile-action>
                            <v-list-tile-content>
                                <v-list-tile-title>My profile</v-list-tile-title>
                            </v-list-tile-content>
                        </v-list-tile>
                        <v-list-tile>
                            <v-list-tile-action>
                                <v-icon>forum</v-icon>
                            </v-list-tile-action>
                            <v-list-tile-content>
                                <v-list-tile-title>
                                    <!-- <v-badge color="success">
                                        <span slot="badge">58</span>
                                        <span>Messages</span>
                                    </v-badge> -->
                                    Messages
                                </v-list-tile-title>
                            </v-list-tile-content>
                        </v-list-tile>
                        <v-divider class="my-3" style="background-color: darkgrey;"></v-divider>
                        <v-list-tile>
                            <v-list-tile-action>
                                <v-icon>settings</v-icon>
                            </v-list-tile-action>
                            <v-list-tile-content>
                                <v-list-tile-title>Account settings</v-list-tile-title>
                            </v-list-tile-content>
                        </v-list-tile>
                        <v-list-tile>
                            <v-list-tile-action>
                                <v-icon>power_settings_new</v-icon>
                            </v-list-tile-action>
                            <v-list-tile-content>
                                <v-list-tile-title>Logout</v-list-tile-title>
                            </v-list-tile-content>
                        </v-list-tile>
                    </v-list>
                </v-menu>
                
                
                <v-menu offset-y position-y>
                    <v-btn flat slot="activator">
                        <v-avatar
                            size="36px">
                            <img src="{{asset('img/timelineavatar.jpg')}}">
                        </v-avatar>
                        <span style="color: #333333">&nbsp Welcome Vicotria!</span>
                        <v-icon>arrow_drop_down</v-icon>
                    </v-btn>
                    <v-list>
                        <v-list-tile>
                            <v-list-tile-action>
                                <v-icon>person_add</v-icon>
                            </v-list-tile-action>
                            <v-list-tile-content>
                                <v-list-tile-title>My profile</v-list-tile-title>
                            </v-list-tile-content>
                        </v-list-tile>
                        <v-list-tile>
                            <v-list-tile-action>
                                <v-icon>forum</v-icon>
                            </v-list-tile-action>
                            <v-list-tile-content>
                                <v-list-tile-title>
                                    <!-- <v-badge color="success">
                                        <span slot="badge">58</span>
                                        <span>Messages</span>
                                    </v-badge> -->
                                    Messages
                                </v-list-tile-title>
                            </v-list-tile-content>
                        </v-list-tile>
                        <v-divider class="my-3" style="background-color: darkgrey;"></v-divider>
                        <v-list-tile>
                            <v-list-tile-action>
                                <v-icon>settings</v-icon>
                            </v-list-tile-action>
                            <v-list-tile-content>
                                <v-list-tile-title>Account settings</v-list-tile-title>
                            </v-list-tile-content>
                        </v-list-tile>
                        <v-list-tile>
                            <v-list-tile-action>
                                <v-icon>power_settings_new</v-icon>
                            </v-list-tile-action>
                            <v-list-tile-content>
                                <v-list-tile-title>Logout</v-list-tile-title>
                            </v-list-tile-content>
                        </v-list-tile>
                    </v-list>
                </v-menu>
            </v-toolbar>
            <v-content>
                <div>
                    <v-breadcrumbs style="padding-bottom: 0px">
                        <v-icon slot="divider">chevron_right</v-icon>
                        <v-breadcrumbs-item
                                v-for="item in getBreadcrumbs"
                                :key="item.label"
                                :disabled="item.disabled">
                            <router-link :to="{name: item.name}">@{{ item.label }}</router-link>
                        </v-breadcrumbs-item>
                    </v-breadcrumbs>
                </div>
                <transition name="fade">
                    <router-view></router-view>
                </transition>
            </v-content>
            <v-footer app fixed>
                <span>&copy; 2017</span>
            </v-footer>
        </v-app>

        <!-- loader -->
        <div v-if="showLoader" class="wask_loader bg_half_transparent">
            <moon-loader color="red"></moon-loader>
        </div>

        <!-- snackbar -->
        <v-snackbar
                :timeout="snackbarDuration"
                :color="snackbarColor"
                top
                v-model="showSnackbar">
            @{{ snackbarMessage }}
        </v-snackbar>

        <!-- dialog confirm -->
        <v-dialog v-show="showDialog" v-model="showDialog" lazy absolute max-width="450px">
            <v-btn color="primary" dark slot="activator">Open Dialog</v-btn>
            <v-card>
                <v-card-title>
                    <div class="headline">@{{ dialogTitle }}</div>
                </v-card-title>
                <v-card-text>@{{ dialogMessage }}</v-card-text>
                <v-card-actions v-if="dialogType=='confirm'">
                    <v-spacer></v-spacer>
                    <v-btn color="green darken-1" flat="flat" @click.native="dialogCancel">Cancel</v-btn>
                    <v-btn color="green darken-1" flat="flat" @click.native="dialogOk">Ok</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>

    </template>

</div>

<!-- Scripts -->
<script src="{{ asset('js/manifest.js') }}"></script>
<script src="{{ asset('js/vendor.js') }}"></script>
<script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>