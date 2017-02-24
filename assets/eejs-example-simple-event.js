(function(){
    'use strict';
    eejs.api.init({collections:['events']}).then(function(){
        var Event = eejs.vue.extend(eejs.api.components.event),
            //uniqId = eejs.utils.getUniqueId(),
            EventPreview = Event.extend({
                template: eejs.data.templates.single_event_preview,
                // id : uniqId
                id : eejs.data.event_id
            }),
            EventForm = Event.extend({
                template: eejs.data.templates.single_event_form,
                // id : uniqId
                id : eejs.data.event_id
            });

       var eventView = new eejs.vue({
           el: '#app',
           components : {
               'eventForm' : EventForm,
               'eventPreview' : EventPreview
           }
       });
    }).catch(function(e){
        console.log(e);
    });
})();

/**
 * Alternative more optimized version
 *
 * This version will result in the Event endpoint only being hit ONCE for the event vs twice in the original.
 * Note: you'd also need to make this change to the component template as defined in the SimpleEvent::shortcodeContent method found in SimpleEvent.php to replace the current return line there.
 *
 *  return EEH_Template::display_template(
         EEJS_EXAMPLE_PLUGIN_DIR . 'templates/app_wrapper_container.php',
         array( 'component' => '<event-form v-bind:initial-id="event.EVT_ID"></event-form><event-preview v-bind:initial-id="event.EVT_ID"></event-preview>' ),
         true
    );
 *
 */
/**
 (function(){
    'use strict';
    eejs.api.init({collections:['events']}).then(function(){
        //uniqId = eejs.utils.getUniqueId(),
        var Event = eejs.vue.extend(eejs.api.components.event),
            EventPreview = Event.extend({
                template: eejs.data.templates.single_event_preview,
                skipInitialization : true,
                initialIdSet : false,
                watch : {
                    'initialId' : function(value) {
                        if (! this.$options.initialIdSet) {
                            this.id = value;
                            this.fetchById();
                            this.$options.initialIdSet = true;
                        }
                    }
                }
            }),
            EventForm = Event.extend({
                template: eejs.data.templates.single_event_form,
                skipInitialization : true,
                initialIdSet : false,
                watch : {
                    'initialId' : function(value) {
                        if (! this.$options.initialIdSet) {
                            this.id = value;
                            this.fetchById();
                            this.$options.initialIdSet = true;
                        }
                    }
                }
            });

       var eventView = new Event({
           el: '#app',
           id: eejs.data.event_id,
           components : {
               'eventForm' : EventForm,
               'eventPreview' : EventPreview
           }
       });
    }).catch(function(e){
        console.log(e);
    });
})();
 /**/