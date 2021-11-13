#define FFI_SCOPE = "atk"
#define FFI_LIB = "libatk-1.0.so"
typedef void* gpointer;
typedef char gchar;
typedef unsigned int guint;
typedef unsigned long guint64;
typedef unsigned long gsize;
typedef gsize GType;
typedef struct _GBytes GBytes;
typedef struct _GArray GArray;
typedef struct _GByteArray GByteArray;
typedef struct _GPtrArray GPtrArray;
typedef struct _GData GData;
typedef struct _GTypeClass GTypeClass;

struct _GArray {
    gchar *data;
    guint len;
};

struct _GByteArray {
    guint8 *data;
    guint len;
};

struct _GPtrArray {
    gpointer *pdata;
    guint len;
};
struct _GTypeClass { 
    GType g_type;
};
typedef struct _GTypeInstance GTypeInstance;
struct _GTypeInstance
{
    GTypeClass *g_class;
};

typedef struct _GObject GObject;

struct _GObject {
    GTypeInstance g_type_instance;
    volatile guint ref_count;
    GData *qdata;
};
typedef struct _GSList GSList;
struct _GSList {
    gpointer data;
    GSList *next;
};
typedef int AtkStateType;
typedef int AtkRelationType;
typedef int AtkRole;
typedef int AtkLayer;
typedef int AtkKeyEventType;
typedef int AtkScrollType;
typedef int AtkTextAttribute;
typedef int AtkTextBoundary;
typedef int AtkTextGranularity;
typedef int AtkTextClipType;
typedef int AtkHyperlinkStateFlags;

typedef guint64 AtkState;
typedef GSList AtkAttributeSet;
typedef struct _AtkObject AtkObject;
typedef struct _AtkRelationSet AtkRelationSet;

struct _AtkRelationSet {
    GObject parent;
    GPtrArray *relations;
};
struct _AtkObject {
    GObject parent;
    gchar *description;
    gchar *name;
    AtkObject *accessible_parent;
    AtkRole role;
    AtkRelationSet *relation_set;
    AtkLayer layer;
};
guint atk_get_major_version(void);
guint atk_get_minor_version(void);
guint atk_get_micro_version(void);
guint atk_get_binary_age(void);
guint atk_get_interface_age(void);
AtkStateType atk_state_type_register(const gchar *name);
const gchar* atk_state_type_get_name(AtkStateType type);
AtkStateType atk_state_type_for_name(const gchar *name);
GType atk_object_get_type(void);
GType atk_implementor_get_type(void);
AtkObject* atk_implementor_ref_accessible(AtkImplementor *implementor);
const gchar* atk_object_get_name(AtkObject *accessible);
const gchar* atk_object_get_description(AtkObject *accessible);
AtkObject* atk_object_get_parent(AtkObject *accessible);
AtkObject* atk_object_peek_parent(AtkObject *accessible);
gint atk_object_get_n_accessible_children(AtkObject *accessible);
AtkObject* atk_object_ref_accessible_child(AtkObject *accessible, gint i);
AtkRelationSet* atk_object_ref_relation_set(AtkObject *accessible);
AtkRole atk_object_get_role(AtkObject *accessible);
AtkLayer atk_object_get_layer(AtkObject *accessible);
gint atk_object_get_mdi_zorder(AtkObject *accessible);
AtkAttributeSet* atk_object_get_attributes(AtkObject *accessible);
AtkStateSet* atk_object_ref_state_set(AtkObject *accessible);
gint atk_object_get_index_in_parent(AtkObject *accessible);
void atk_object_set_name(AtkObject *accessible, const gchar *name);
void atk_object_set_description(AtkObject *accessible, const gchar *description);
void atk_object_set_parent(AtkObject *accessible, AtkObject *parent);
void atk_object_set_role(AtkObject *accessible, AtkRole role);
guint atk_object_connect_property_change_handler(AtkObject *accessible, AtkPropertyChangeHandler *handler);
void atk_object_remove_property_change_handler(AtkObject *accessible, guint handler_id);
void atk_object_notify_state_change(AtkObject *accessible, AtkState state, gboolean value);
void atk_object_initialize(AtkObject *accessible, gpointer data);
const gchar* atk_role_get_name(AtkRole role);
AtkRole atk_role_for_name(const gchar *name);
gboolean atk_object_add_relationship(AtkObject *object, AtkRelationType relationship, AtkObject *target);
gboolean atk_object_remove_relationship(AtkObject *object, AtkRelationType relationship, AtkObject *target);
const gchar* atk_role_get_localized_name(AtkRole role);
AtkRole atk_role_register(const gchar *name);
const gchar* atk_object_get_object_locale(AtkObject *accessible);
LIBGTK_FUNC_AVAILABLE_IN_UINX const gchar* atk_object_get_accessible_id(AtkObject *accessible);
LIBGTK_FUNC_AVAILABLE_IN_UINX void atk_object_set_accessible_id(AtkObject *accessible, const gchar *name);
GType atk_action_get_type(void);
gboolean atk_action_do_action(AtkAction *action, gint i);
gint atk_action_get_n_actions(AtkAction *action);
const gchar* atk_action_get_description(AtkAction *action, gint i);
const gchar* atk_action_get_name(AtkAction *action, gint i);
const gchar* atk_action_get_keybinding(AtkAction *action, gint i);
gboolean atk_action_set_description(AtkAction *action, gint i, const gchar *desc);
const gchar* atk_action_get_localized_name(AtkAction *action, gint i);
GType atk_util_get_type(void);
guint atk_add_focus_tracker(AtkEventListener focus_tracker);
void atk_remove_focus_tracker(guint tracker_id);
void atk_focus_tracker_init(AtkEventListenerInit init);
void atk_focus_tracker_notify(AtkObject *object);
guint atk_add_global_event_listener(GSignalEmissionHook listener, const gchar *event_type);
void atk_remove_global_event_listener(guint listener_id);
guint atk_add_key_event_listener(AtkKeySnoopFunc listener, gpointer data);
void atk_remove_key_event_listener(guint listener_id);
AtkObject* atk_get_root(void);
AtkObject* atk_get_focus_object(void);
const gchar *atk_get_toolkit_name(void);
const gchar *atk_get_toolkit_version(void);
const gchar *atk_get_version(void);
GType atk_rectangle_get_type(void);
GType atk_component_get_type(void);
guint atk_component_add_focus_handler(AtkComponent *component, AtkFocusHandler handler);
gboolean atk_component_contains(AtkComponent *component, gint x, gint y, AtkCoordType coord_type);
AtkObject* atk_component_ref_accessible_at_point(AtkComponent *component, gint x, gint y, AtkCoordType coord_type);
void atk_component_get_extents(AtkComponent *component, gint *x, gint *y, gint *width, gint *height, AtkCoordType coord_type);
void atk_component_get_position(AtkComponent *component, gint *x, gint *y, AtkCoordType coord_type);
void atk_component_get_size(AtkComponent *component, gint *width, gint *height);
AtkLayer atk_component_get_layer(AtkComponent *component);
gint atk_component_get_mdi_zorder(AtkComponent *component);
gboolean atk_component_grab_focus(AtkComponent *component);
void atk_component_remove_focus_handler(AtkComponent *component, guint handler_id);
gboolean atk_component_set_extents(AtkComponent *component, gint x, gint y, gint width, gint height, AtkCoordType coord_type);
gboolean atk_component_set_position(AtkComponent *component, gint x, gint y, AtkCoordType coord_type);
gboolean atk_component_set_size(AtkComponent *component, gint width, gint height);
gdouble atk_component_get_alpha(AtkComponent *component);
ATK_AVAILABLE_IN_2_30 gboolean atk_component_scroll_to(AtkComponent *component, AtkScrollType type);
ATK_AVAILABLE_IN_2_30 gboolean atk_component_scroll_to_point(AtkComponent *component, AtkCoordType coords, gint x, gint y);
GType atk_document_get_type(void);
const gchar* atk_document_get_document_type(AtkDocument *document);
gpointer atk_document_get_document(AtkDocument *document);
const gchar* atk_document_get_locale(AtkDocument *document);
AtkAttributeSet* atk_document_get_attributes(AtkDocument *document);
const gchar* atk_document_get_attribute_value(AtkDocument *document, const gchar *attribute_name);
gboolean atk_document_set_attribute_value(AtkDocument *document, const gchar *attribute_name, const gchar *attribute_value);
gint atk_document_get_current_page_number(AtkDocument *document);
gint atk_document_get_page_count(AtkDocument *document);
AtkTextAttribute atk_text_attribute_register(const gchar *name);
GType atk_text_range_get_type(void);
GType atk_text_get_type(void);
gchar* atk_text_get_text(AtkText *text, gint start_offset, gint end_offset);
gunichar atk_text_get_character_at_offset(AtkText *text, gint offset);
gchar* atk_text_get_text_after_offset(AtkText *text, gint offset, AtkTextBoundary boundary_type, gint *start_offset, gint *end_offset);
gchar* atk_text_get_text_at_offset(AtkText *text, gint offset, AtkTextBoundary boundary_type, gint *start_offset, gint *end_offset);
gchar* atk_text_get_text_before_offset(AtkText *text, gint offset, AtkTextBoundary boundary_type, gint *start_offset, gint *end_offset);
gchar* atk_text_get_string_at_offset(AtkText *text, gint offset, AtkTextGranularity granularity, gint *start_offset, gint *end_offset);
gint atk_text_get_caret_offset(AtkText *text);
void atk_text_get_character_extents(AtkText *text, gint offset, gint *x, gint *y, gint *width, gint *height, AtkCoordType coords);
AtkAttributeSet* atk_text_get_run_attributes(AtkText *text, gint offset, gint *start_offset, gint *end_offset);
AtkAttributeSet* atk_text_get_default_attributes(AtkText *text);
gint atk_text_get_character_count(AtkText *text);
gint atk_text_get_offset_at_point(AtkText *text, gint x, gint y, AtkCoordType coords);
gint atk_text_get_n_selections(AtkText *text);
gchar* atk_text_get_selection(AtkText *text, gint selection_num, gint *start_offset, gint *end_offset);
gboolean atk_text_add_selection(AtkText *text, gint start_offset, gint end_offset);
gboolean atk_text_remove_selection(AtkText *text, gint selection_num);
gboolean atk_text_set_selection(AtkText *text, gint selection_num, gint start_offset, gint end_offset);
gboolean atk_text_set_caret_offset(AtkText *text, gint offset);
void atk_text_get_range_extents(AtkText *text, gint start_offset, gint end_offset, AtkCoordType coord_type, AtkTextRectangle *rect);
AtkTextRange** atk_text_get_bounded_ranges(AtkText *text, AtkTextRectangle *rect, AtkCoordType coord_type, AtkTextClipType x_clip_type, AtkTextClipType y_clip_type);
void atk_text_free_ranges(AtkTextRange **ranges);
void atk_attribute_set_free(AtkAttributeSet *attrib_set);
const gchar* atk_text_attribute_get_name(AtkTextAttribute attr);
AtkTextAttribute atk_text_attribute_for_name(const gchar *name);
const gchar* atk_text_attribute_get_value(AtkTextAttribute attr, gint index_);
LIBGTK_FUNC_AVAILABLE_IN_UINX gboolean atk_text_scroll_substring_to(AtkText *text, gint start_offset, gint end_offset, AtkScrollType type);
LIBGTK_FUNC_AVAILABLE_IN_UINX gboolean atk_text_scroll_substring_to_point(AtkText *text, gint start_offset, gint end_offset, AtkCoordType coords, gint x, gint y);
GType atk_editable_text_get_type(void);
gboolean atk_editable_text_set_run_attributes(AtkEditableText *text, AtkAttributeSet *attrib_set, gint start_offset, gint end_offset);
void atk_editable_text_set_text_contents(AtkEditableText *text, const gchar *string);
void atk_editable_text_insert_text(AtkEditableText *text, const gchar *string, gint length, gint *position);
void atk_editable_text_copy_text(AtkEditableText *text, gint start_pos, gint end_pos);
void atk_editable_text_cut_text(AtkEditableText *text, gint start_pos, gint end_pos);
void atk_editable_text_delete_text(AtkEditableText *text, gint start_pos, gint end_pos);
void atk_editable_text_paste_text(AtkEditableText *text, gint position);
LIBGTK_FUNC_AVAILABLE_IN_UINX GType atk_scroll_type_get_type(void);
GType atk_hyperlink_state_flags_get_type(void);
GType atk_role_get_type(void);
GType atk_layer_get_type(void);
GType atk_relation_type_get_type(void);
GType atk_state_type_get_type(void);
GType atk_text_attribute_get_type(void);
GType atk_text_boundary_get_type(void);
GType atk_text_granularity_get_type(void);
GType atk_text_clip_type_get_type(void);
GType atk_key_event_type_get_type(void);
GType atk_coord_type_get_type(void);
GType atk_value_type_get_type(void);
GType atk_gobject_accessible_get_type(void);
AtkObject *atk_gobject_accessible_for_object(GObject *obj);
GObject *atk_gobject_accessible_get_object(AtkGObjectAccessible *obj);
GType atk_hyperlink_get_type(void);
gchar* atk_hyperlink_get_uri(AtkHyperlink *link_, gint i);
AtkObject* atk_hyperlink_get_object(AtkHyperlink *link_, gint i);
gint atk_hyperlink_get_end_index(AtkHyperlink *link_);
gint atk_hyperlink_get_start_index(AtkHyperlink *link_);
gboolean atk_hyperlink_is_valid(AtkHyperlink *link_);
gboolean atk_hyperlink_is_inline(AtkHyperlink *link_);
gint atk_hyperlink_get_n_anchors(AtkHyperlink *link_);
gboolean atk_hyperlink_is_selected_link(AtkHyperlink *link_);
GType atk_hyperlink_impl_get_type(void);
AtkHyperlink *atk_hyperlink_impl_get_hyperlink(AtkHyperlinkImpl *impl);
GType atk_hypertext_get_type(void);
AtkHyperlink* atk_hypertext_get_link(AtkHypertext *hypertext, gint link_index);
gint atk_hypertext_get_n_links(AtkHypertext *hypertext);
gint atk_hypertext_get_link_index(AtkHypertext *hypertext, gint char_index);
GType atk_image_get_type(void);
const gchar* atk_image_get_image_description(AtkImage *image);
void atk_image_get_image_size(AtkImage *image, gint *width, gint *height);
gboolean atk_image_set_image_description(AtkImage *image, const gchar *description);
void atk_image_get_image_position(AtkImage *image, gint *x, gint *y, AtkCoordType coord_type);
const gchar* atk_image_get_image_locale(AtkImage *image);
GType atk_no_op_object_get_type(void);
AtkObject *atk_no_op_object_new(GObject *obj);
GType atk_object_factory_get_type(void);
AtkObject* atk_object_factory_create_accessible(AtkObjectFactory *factory, GObject *obj);
void atk_object_factory_invalidate(AtkObjectFactory *factory);
GType atk_object_factory_get_accessible_type(AtkObjectFactory *factory);
GType atk_no_op_object_factory_get_type(void);
AtkObjectFactory *atk_no_op_object_factory_new(void);
GType atk_plug_get_type(void);
AtkObject* atk_plug_new(void);
gchar* atk_plug_get_id(AtkPlug* plug);
GType atk_range_get_type(void);
AtkRange* atk_range_copy(AtkRange *src);
void atk_range_free(AtkRange *range);
gdouble atk_range_get_lower_limit(AtkRange *range);
gdouble atk_range_get_upper_limit(AtkRange *range);
const gchar* atk_range_get_description(AtkRange *range);
AtkRange* atk_range_new(gdouble lower_limit, gdouble upper_limit, const gchar *description);
GType atk_registry_get_type(void);
void atk_registry_set_factory_type(AtkRegistry *registry, GType type, GType factory_type);
GType atk_registry_get_factory_type(AtkRegistry *registry, GType type);
AtkObjectFactory* atk_registry_get_factory(AtkRegistry *registry, GType type);
AtkRegistry* atk_get_default_registry(void);
GType atk_relation_get_type(void);
AtkRelationType atk_relation_type_register(const gchar *name);
const gchar* atk_relation_type_get_name(AtkRelationType type);
AtkRelationType atk_relation_type_for_name(const gchar *name);
AtkRelation* atk_relation_new(AtkObject **targets, gint n_targets, AtkRelationType relationship);
AtkRelationType atk_relation_get_relation_type(AtkRelation *relation);
GPtrArray* atk_relation_get_target(AtkRelation *relation);
void atk_relation_add_target(AtkRelation *relation, AtkObject *target);
gboolean atk_relation_remove_target(AtkRelation *relation, AtkObject *target);
GType atk_relation_set_get_type(void);
AtkRelationSet* atk_relation_set_new(void);
gboolean atk_relation_set_contains(AtkRelationSet *set, AtkRelationType relationship);
gboolean atk_relation_set_contains_target(AtkRelationSet *set, AtkRelationType relationship, AtkObject *target);
void atk_relation_set_remove(AtkRelationSet *set, AtkRelation *relation);
void atk_relation_set_add(AtkRelationSet *set, AtkRelation *relation);
gint atk_relation_set_get_n_relations(AtkRelationSet *set);
AtkRelation* atk_relation_set_get_relation(AtkRelationSet *set, gint i);
AtkRelation* atk_relation_set_get_relation_by_type(AtkRelationSet *set, AtkRelationType relationship);
void atk_relation_set_add_relation_by_type(AtkRelationSet *set, AtkRelationType relationship, AtkObject *target);
GType atk_selection_get_type(void);
gboolean atk_selection_add_selection(AtkSelection *selection, gint i);
gboolean atk_selection_clear_selection(AtkSelection *selection);
AtkObject* atk_selection_ref_selection(AtkSelection *selection, gint i);
gint atk_selection_get_selection_count(AtkSelection *selection);
gboolean atk_selection_is_child_selected(AtkSelection *selection, gint i);
gboolean atk_selection_remove_selection(AtkSelection *selection, gint i);
gboolean atk_selection_select_all_selection(AtkSelection *selection);
GType atk_socket_get_type(void);
AtkObject* atk_socket_new(void);
void atk_socket_embed(AtkSocket* obj, gchar* plug_id);
gboolean atk_socket_is_occupied(AtkSocket* obj);
GType atk_state_set_get_type(void);
AtkStateSet* atk_state_set_new(void);
gboolean atk_state_set_is_empty(AtkStateSet *set);
gboolean atk_state_set_add_state(AtkStateSet *set, AtkStateType type);
void atk_state_set_add_states(AtkStateSet *set, AtkStateType *types, gint n_types);
void atk_state_set_clear_states(AtkStateSet *set);
gboolean atk_state_set_contains_state(AtkStateSet *set, AtkStateType type);
gboolean atk_state_set_contains_states(AtkStateSet *set, AtkStateType *types, gint n_types);
gboolean atk_state_set_remove_state(AtkStateSet *set, AtkStateType type);
AtkStateSet* atk_state_set_and_sets(AtkStateSet *set, AtkStateSet *compare_set);
AtkStateSet* atk_state_set_or_sets(AtkStateSet *set, AtkStateSet *compare_set);
AtkStateSet* atk_state_set_xor_sets(AtkStateSet *set, AtkStateSet *compare_set);
GType atk_streamable_content_get_type(void);
gint atk_streamable_content_get_n_mime_types(AtkStreamableContent *streamable);
const gchar* atk_streamable_content_get_mime_type(AtkStreamableContent *streamable, gint i);
GIOChannel* atk_streamable_content_get_stream(AtkStreamableContent *streamable, const gchar *mime_type);
const gchar* atk_streamable_content_get_uri(AtkStreamableContent *streamable, const gchar *mime_type);
GType atk_table_get_type(void);
AtkObject* atk_table_ref_at(AtkTable *table, gint row, gint column);
gint atk_table_get_index_at(AtkTable *table, gint row, gint column);
gint atk_table_get_column_at_index(AtkTable *table, gint index_);
gint atk_table_get_row_at_index(AtkTable *table, gint index_);
gint atk_table_get_n_columns(AtkTable *table);
gint atk_table_get_n_rows(AtkTable *table);
gint atk_table_get_column_extent_at(AtkTable *table, gint row, gint column);
gint atk_table_get_row_extent_at(AtkTable *table, gint row, gint column);
AtkObject*atk_table_get_caption(AtkTable *table);
const gchar* atk_table_get_column_description(AtkTable *table, gint column);
AtkObject* atk_table_get_column_header(AtkTable *table, gint column);
const gchar* atk_table_get_row_description(AtkTable *table, gint row);
AtkObject* atk_table_get_row_header(AtkTable *table, gint row);
AtkObject* atk_table_get_summary(AtkTable *table);
void atk_table_set_caption(AtkTable *table, AtkObject *caption);
void atk_table_set_column_description(AtkTable *table, gint column, const gchar *description);
void atk_table_set_column_header(AtkTable *table, gint column, AtkObject *header);
void atk_table_set_row_description(AtkTable *table, gint row, const gchar *description);
void atk_table_set_row_header(AtkTable *table, gint row, AtkObject *header);
void atk_table_set_summary(AtkTable *table, AtkObject *accessible);
gint atk_table_get_selected_columns(AtkTable *table, gint **selected);
gint atk_table_get_selected_rows(AtkTable *table, gint **selected);
gboolean atk_table_is_column_selected(AtkTable *table, gint column);
gboolean atk_table_is_row_selected(AtkTable *table, gint row);
gboolean atk_table_is_selected(AtkTable *table, gint row, gint column);
gboolean atk_table_add_row_selection(AtkTable *table, gint row);
gboolean atk_table_remove_row_selection(AtkTable *table, gint row);
gboolean atk_table_add_column_selection(AtkTable *table, gint column);
gboolean atk_table_remove_column_selection(AtkTable *table, gint column);
GType atk_table_cell_get_type(void);
gint atk_table_cell_get_column_span(AtkTableCell *cell);
GPtrArray * atk_table_cell_get_column_header_cells(AtkTableCell *cell);
gboolean atk_table_cell_get_position(AtkTableCell *cell, gint *row, gint *column);
gint atk_table_cell_get_row_span(AtkTableCell *cell);
GPtrArray * atk_table_cell_get_row_header_cells(AtkTableCell *cell);
gboolean atk_table_cell_get_row_column_span(AtkTableCell *cell, gint *row, gint *column, gint *row_span, gint *column_span);
AtkObject * atk_table_cell_get_table(AtkTableCell *cell);
GType atk_misc_get_type(void);
void atk_misc_threads_enter(AtkMisc *misc);
void atk_misc_threads_leave(AtkMisc *misc);
const AtkMisc *atk_misc_get_instance(void);
GType atk_value_get_type(void);
void atk_value_get_current_value(AtkValue *obj, GValue *value);
void atk_value_get_maximum_value(AtkValue *obj, GValue *value);
void atk_value_get_minimum_value(AtkValue *obj, GValue *value);
gboolean atk_value_set_current_value(AtkValue *obj, const GValue *value);
void atk_value_get_minimum_increment(AtkValue *obj, GValue *value);
void atk_value_get_value_and_text(AtkValue *obj, gdouble *value, gchar **text);
AtkRange* atk_value_get_range(AtkValue *obj);
gdouble atk_value_get_increment(AtkValue *obj);
GSList* atk_value_get_sub_ranges(AtkValue *obj);
void atk_value_set_value(AtkValue *obj, const gdouble new_value);
const gchar* atk_value_type_get_name(AtkValueType value_type);
const gchar* atk_value_type_get_localized_name(AtkValueType value_type);
GType atk_window_get_type(void);
AtkMisc *atk_misc_instance;