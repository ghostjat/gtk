#define FFI_SCOPE "gtk"
#define FFI_LIB "libgtk-3.so.0"

typedef char gchar;
typedef short gshort;
typedef long glong;
typedef int gint;
typedef gint gboolean;
typedef unsigned char guchar;
typedef unsigned short gushort;
typedef unsigned long gulong;
typedef unsigned int guint;
typedef float gfloat;
typedef double gdouble;
typedef void* gpointer;
typedef long int ptrdiff_t;
typedef long unsigned int size_t;
typedef int wchar_t;

typedef struct {
    long long __max_align_ll;
    long double __max_align_ld;
} max_align_t;
typedef signed char int8;
typedef unsigned char guint8;
typedef signed short int16;
typedef unsigned short guint16;
typedef signed int int32;
typedef unsigned int guint32;
typedef signed long int64;
typedef unsigned long guint64;
typedef signed long gssize;
typedef unsigned long gsize;
typedef int64 goffset;
typedef signed long intptr;
typedef unsigned long guintptr;
typedef int GPid;
typedef unsigned char __u_char;
typedef unsigned short int __u_short;
typedef unsigned int __u_int;
typedef unsigned long int __u_long;
typedef signed char __int8_t;
typedef unsigned char __uint8_t;
typedef signed short int __int16_t;
typedef unsigned short int __uint16_t;
typedef signed int __int32_t;
typedef unsigned int __uint32_t;
typedef signed long int __int64_t;
typedef unsigned long int __uint64_t;
typedef __int8_t __int_least8_t;
typedef __uint8_t __uint_least8_t;
typedef __int16_t __int_least16_t;
typedef __uint16_t __uint_least16_t;
typedef __int32_t __int_least32_t;
typedef __uint32_t __uint_least32_t;
typedef __int64_t __int_least64_t;
typedef __uint64_t __uint_least64_t;
typedef long int __quad_t;
typedef unsigned long int __u_quad_t;
typedef long int __intmax_t;
typedef unsigned long int __uintmax_t;
typedef unsigned long int __dev_t;
typedef unsigned int __uid_t;
typedef unsigned int __gid_t;
typedef unsigned long int __ino_t;
typedef unsigned long int __ino64_t;
typedef unsigned int __mode_t;
typedef unsigned long int __nlink_t;
typedef long int __off_t;
typedef long int __off64_t;
typedef int __pid_t;
typedef guint32 gunichar;

typedef struct {
    int __val[2];
} __fsid_t;
typedef long int __clock_t;
typedef unsigned long int __rlim_t;
typedef unsigned long int __rlim64_t;
typedef unsigned int __id_t;
typedef long int __time_t;
typedef unsigned int __useconds_t;
typedef long int __suseconds_t;
typedef int __daddr_t;
typedef int __key_t;
typedef int __clockid_t;
typedef void * __timer_t;
typedef long int __blksize_t;
typedef long int __blkcnt_t;
typedef long int __blkcnt64_t;
typedef unsigned long int __fsblkcnt_t;
typedef unsigned long int __fsblkcnt64_t;
typedef unsigned long int __fsfilcnt_t;
typedef unsigned long int __fsfilcnt64_t;
typedef long int __fsword_t;
typedef long int __ssize_t;
typedef long int __syscall_slong_t;
typedef unsigned long int __syscall_ulong_t;
typedef __off64_t __loff_t;
typedef char *__caddr_t;
typedef long int __intptr_t;
typedef unsigned int __socklen_t;
typedef int __sig_atomic_t;
typedef guint32 GQuark;
typedef gsize GType;
typedef struct _GValue GValue;
typedef struct _GtkApplication GtkApplication;
typedef struct _GtkActionable GtkActionable;
typedef struct _GtkBuilder GtkBuilder;
typedef struct _GObject GObject;
typedef struct _GtkWidget GtkWidget;
typedef struct  GtkWidget GtkContainer;
typedef struct _GdkPixbuf GdkPixbuf;
typedef struct _GIcon GIcon;
typedef struct _GdkPixbufSimpleAnim GdkPixbufSimpleAnim;
typedef struct _GtkAdjustment GtkAdjustment;
typedef struct _GtkTextBuffer GtkTextBuffer;
typedef struct _GtkTextTagTable GtkTextTagTable;
typedef struct GdkPixbufAnimation;
typedef struct GObject GtkTextTag;
typedef struct _GdkEvent GdkEvent;
typedef struct _GdkWindow GdkWindow;
typedef struct _GdkDevice GdkDevice;
typedef struct _GList GList;
typedef struct _GSList GSList;
typedef struct _GObject GtkListStore;
typedef struct _GObject GtkTreeViewColumn;
typedef struct _GObject GtkCellRenderer;
typedef struct _GObject GtkTreeView;
typedef struct GObject GtkTextMark;
typedef struct _GtkTreeModel GtkTreeModel;
typedef struct _GtkTreePath GtkTreePath;
typedef struct _PangoFontsetSimple PangoFontsetSimple;
typedef struct _PangoFontsetSimpleClass PangoFontsetSimpleClass;
typedef struct _PangoFontMapClass PangoFontMapClass;
typedef struct _PangoContext PangoContext;
typedef struct _GClosure GClosure;
typedef struct _GtkTreeSortable GtkTreeSortable;
typedef struct _cairo cairo_t;
typedef struct {
} PangoFontDescription;
struct _GTypeInstance {
    GType *g_class;
};
typedef struct _GTypeInstance GTypeInstance;

struct _GtkTreeIter {
    int stamp;
    void* user_data;
    void* user_data2;
    void* user_data3;
};
struct _GtkTextIter {
  /* GtkTextIter is an opaque datatype; ignore all these fields.
   * Initialize the iter with gtk_text_buffer_get_iter_*
   * functions
   */
  /*< private >*/
  gpointer dummy1;
  gpointer dummy2;
  int dummy3;
  int dummy4;
  int dummy5;
  int dummy6;
  int dummy7;
  int dummy8;
  gpointer dummy9;
  gpointer dummy10;
  int dummy11;
  int dummy12;
  /* padding */
  int dummy13;
  gpointer dummy14;
};
typedef struct _GtkTextIter GtkTextIter;
typedef struct _GtkTextAttributes GtkTextAttributes;
typedef struct GObject  GtkTextChildAnchor;
struct GdkRectangle {
    int x, y;
    int width, height;
};
typedef struct GdkRectangle GdkRectangle;
typedef struct _GdkWindow   GdkWindow;
struct _GdkEventKey
{
  int type;
  GdkWindow *window;
  gint send_event;
  guint time;
  guint state;
  guint keyval;
  gint length;
  gchar *string;
  guint hardware_keycode;
  guint group;
  guint is_modifier : 1;
}; 
typedef struct _GdkEventKey   GdkEventKey;
typedef struct _GtkTreeIter GtkTreeIter;
typedef void (*GCallback)(gpointer, gpointer);
typedef void(*GtkBuilderConnectFunc) (GtkBuilder *builder,
        GObject *object,
        const char *signal_name,
        const char *handler_name,
        GObject *connect_object,
        int flags,
        void* user_data);

typedef enum {
    GTK_SORT_ASCENDING,
    GTK_SORT_DESCENDING
} GtkSortType;

typedef enum {
    GTK_ORIENTATION_HORIZONTAL,
    GTK_ORIENTATION_VERTICAL
} GtkOrientation;

typedef enum {
    GTK_TREE_VIEW_GRID_LINES_NONE,
    GTK_TREE_VIEW_GRID_LINES_HORIZONTAL,
    GTK_TREE_VIEW_GRID_LINES_VERTICAL,
    GTK_TREE_VIEW_GRID_LINES_BOTH
} GtkTreeViewGridLines;

typedef enum {
    GTK_WINDOW_TOPLEVEL,
    GTK_WINDOW_POPUP
} GtkWindowType;

typedef enum {
    GTK_WIN_POS_NONE,
    GTK_WIN_POS_CENTER,
    GTK_WIN_POS_MOUSE
} GtkWindowPosition;

typedef enum {
    GTK_ICON_SIZE_INVALID,
    GTK_ICON_SIZE_MENU,
    GTK_ICON_SIZE_SMALL_TOOLBAR,
    GTK_ICON_SIZE_LARGE_TOOLBAR,
    GTK_ICON_SIZE_BUTTON,
    GTK_ICON_SIZE_DND,
    GTK_ICON_SIZE_DIALOG
} GtkIconSize;

typedef enum {
  GTK_POS_LEFT,
  GTK_POS_RIGHT,
  GTK_POS_TOP,
  GTK_POS_BOTTOM
} GtkPositionType;

typedef enum {
  GTK_BUILDER_ERROR_INVALID_TYPE_FUNCTION,
  GTK_BUILDER_ERROR_UNHANDLED_TAG,
  GTK_BUILDER_ERROR_MISSING_ATTRIBUTE,
  GTK_BUILDER_ERROR_INVALID_ATTRIBUTE,
  GTK_BUILDER_ERROR_INVALID_TAG,
  GTK_BUILDER_ERROR_MISSING_PROPERTY_VALUE,
  GTK_BUILDER_ERROR_INVALID_VALUE,
  GTK_BUILDER_ERROR_VERSION_MISMATCH,
  GTK_BUILDER_ERROR_DUPLICATE_ID,
  GTK_BUILDER_ERROR_OBJECT_TYPE_REFUSED,
  GTK_BUILDER_ERROR_TEMPLATE_MISMATCH,
  GTK_BUILDER_ERROR_INVALID_PROPERTY,
  GTK_BUILDER_ERROR_INVALID_SIGNAL,
  GTK_BUILDER_ERROR_INVALID_ID
} GtkBuilderError;

typedef enum {
  GTK_NOTEBOOK_TAB_FIRST,
  GTK_NOTEBOOK_TAB_LAST
} GtkNotebookTab;
typedef enum {
  GTK_PACK_START,
  GTK_PACK_END
} GtkPackType;

typedef enum {
  GTK_DIALOG_MODAL   = 1 << 0,
  GTK_DIALOG_DESTROY_WITH_PARENT = 1 << 1,
  GTK_DIALOG_USE_HEADER_BAR      = 1 << 2
} GtkDialogFlags;

typedef enum {
  GTK_RESPONSE_NONE         = -1,
  GTK_RESPONSE_REJECT       = -2,
  GTK_RESPONSE_ACCEPT       = -3,
  GTK_RESPONSE_DELETE_EVENT = -4,
  GTK_RESPONSE_OK           = -5,
  GTK_RESPONSE_CANCEL       = -6,
  GTK_RESPONSE_CLOSE        = -7,
  GTK_RESPONSE_YES          = -8,
  GTK_RESPONSE_NO           = -9,
  GTK_RESPONSE_APPLY        = -10,
  GTK_RESPONSE_HELP         = -11
} GtkResponseType;

typedef enum {
  GTK_BUTTONS_NONE,
  GTK_BUTTONS_OK,
  GTK_BUTTONS_CLOSE,
  GTK_BUTTONS_CANCEL,
  GTK_BUTTONS_YES_NO,
  GTK_BUTTONS_OK_CANCEL
} GtkButtonsType;
typedef enum {
  GTK_MESSAGE_INFO,
  GTK_MESSAGE_WARNING,
  GTK_MESSAGE_QUESTION,
  GTK_MESSAGE_ERROR,
  GTK_MESSAGE_OTHER
} GtkMessageType;

typedef enum {
    GTK_INPUT_PURPOSE_FREE_FORM,
    GTK_INPUT_PURPOSE_ALPHA,
    GTK_INPUT_PURPOSE_DIGITS,
    GTK_INPUT_PURPOSE_NUMBER,
    GTK_INPUT_PURPOSE_PHONE,
    GTK_INPUT_PURPOSE_URL,
    GTK_INPUT_PURPOSE_EMAIL,
    GTK_INPUT_PURPOSE_NAME,
    GTK_INPUT_PURPOSE_PASSWORD,
    GTK_INPUT_PURPOSE_PIN,
    GTK_INPUT_PURPOSE_TERMINAL,
}GtkInputPurpose;

/* GdkRGBA */
typedef struct {
    gdouble red;
    gdouble green;
    gdouble blue;
    gdouble alpha;
} GdkRGBA;

void g_type_init(void);
extern const char * g_type_name(GType type);

PangoContext * gtk_widget_create_pango_context(GtkWidget *widget);
PangoContext * gtk_widget_get_pango_context(GtkWidget *widget);

//GtkWidget
GtkWidget *gtk_widget_new (GType type,const gchar *first_property_name,...);
void gtk_widget_destroy (GtkWidget *widget);
bool gtk_widget_in_destruction (GtkWidget *widget);
void gtk_widget_show (GtkWidget *widget);
void gtk_widget_show_now (GtkWidget *widget);
void gtk_widget_show_all(GtkWidget *widget);
void gtk_widget_hide (GtkWidget *widget);
void gtk_widget_realize (GtkWidget *widget);
void gtk_widget_unrealize (GtkWidget *widget);
void gtk_widget_draw (GtkWidget *widget, cairo_t *cr);
void gtk_widget_add_events(GtkWidget *widget, int events);
void gtk_widget_override_font(GtkWidget* widget, PangoFontDescription* font_desc);
void gtk_widget_queue_allocate(GtkWidget *widget);
void gtk_widget_queue_draw(GtkWidget *widget);
void gtk_widget_queue_resize(GtkWidget *widget);
void gtk_widget_queue_draw_area(GtkWidget *widget, int x, int y, int width, int height);
void gtk_widget_queue_resize_no_redraw (GtkWidget *widget);
//GdkFrameClock *gtk_widget_get_frame_clock (GtkWidget *widget);
int gtk_widget_get_scale_factor (GtkWidget *widget);
bool gtk_widget_is_focus (GtkWidget *widget);
void gtk_widget_grab_focus (GtkWidget *widget);
void gtk_widget_set_name (GtkWidget *widget, const gchar *name);
const gchar * gtk_widget_get_name (GtkWidget *widget);
void gtk_widget_set_sensitive (GtkWidget *widget,bool sensitive);
void gtk_widget_set_parent (GtkWidget *widget,GtkWidget *parent);
void gtk_widget_set_size_request (GtkWidget *widget,int width,int height);

//GtkListStore 
GtkListStore *gtk_list_store_new(int n_columns, ...);
void gtk_list_store_append(GtkListStore *list_store, GtkTreeIter *iter);
void gtk_list_store_set(GtkListStore *list_store, GtkTreeIter *iter, ...);
void gtk_list_store_insert(GtkListStore *list_store, GtkTreeIter *iter, int position);
void gtk_list_store_set_value(GtkListStore *list_store, GtkTreeIter *iter, int column, GValue *value);
void gtk_list_store_insert_with_values(GtkListStore *list_store, GtkTreeIter *iter, int position, ...);
bool gtk_list_store_iter_is_valid(GtkListStore *list_store, GtkTreeIter *iter);

//GtkTreeView
GtkWidget *gtk_tree_view_new(void);
GtkWidget *gtk_tree_view_new_with_model(GtkTreeModel *model);
int gtk_tree_view_append_column(GtkWidget *tree_view, GtkTreeViewColumn *column);
void gtk_tree_view_set_model(GtkWidget* tree_view, GtkTreeModel *model);
void gtk_tree_view_set_grid_lines(GtkWidget *tree_view, GtkTreeViewGridLines grid_lines);
void gtk_tree_view_set_headers_clickable(GtkWidget *tree_view, bool setting);
int gtk_tree_view_insert_column_with_attributes(GtkWidget *tree_view,int position,const char *title, GtkCellRenderer *cell, ...);

GtkTreeViewColumn *gtk_tree_view_column_new_with_attributes(const char *title, GtkCellRenderer *cell, ...);
void gtk_tree_view_column_set_title(GtkTreeViewColumn *tree_column, const char *title);
void gtk_tree_view_column_set_reorderable(GtkTreeViewColumn *tree_column, bool reorderable);
void gtk_tree_view_column_set_sort_indicator(GtkTreeViewColumn *tree_column, bool setting);
void gtk_tree_view_column_set_resizable(GtkTreeViewColumn *tree_column, bool resizable);
void gtk_tree_view_column_set_clickable (GtkTreeViewColumn *tree_column, bool clickable);
void gtk_tree_view_column_set_sort_column_id (GtkTreeViewColumn *tree_column,int sort_column_id);

//GtkCellView
GtkWidget* gtk_cell_view_new (void);
GtkWidget* gtk_cell_view_new_with_markup (const gchar* markup);
GtkWidget* gtk_cell_view_new_with_pixbuf (GdkPixbuf* pixbuf);
GtkWidget* gtk_cell_view_new_with_text (const gchar* text);
void gtk_cell_view_set_model (GtkWidget *cell_view, GtkTreeModel *model);
GtkTreeModel * 	gtk_cell_view_get_model (GtkWidget *cell_view);

//GtkWidget* gtk_cell_view_new_with_context (GtkCellArea* area,GtkCellAreaContext* context);

//GtkTreeModel
bool gtk_tree_model_get_iter_first(GtkTreeModel *tree_model, GtkTreeIter *iter);
GtkTreePath *gtk_tree_model_get_path (GtkTreeModel *tree_model, GtkTreeIter *iter);

// GtkTreeSort
bool gtk_tree_sortable_get_sort_column_id (GtkTreeSortable *sortable,int *sort_column_id, GtkSortType *order);
void gtk_tree_sortable_set_sort_column_id (GtkTreeSortable *sortable,int sort_column_id,GtkSortType order);

//GtkCellRenderer
GtkCellRenderer *gtk_cell_renderer_text_new(void);
GtkCellRenderer *gtk_cell_renderer_pixbuf_new(void);
GtkCellRenderer *gtk_cell_renderer_toggle_new (void);

bool    gtk_cell_renderer_toggle_get_radio (GtkCellRenderer *toggle);
void    gtk_cell_renderer_toggle_set_radio (GtkCellRenderer *toggle, bool radio);
bool    gtk_cell_renderer_toggle_get_active (GtkCellRenderer *toggle);
void    gtk_cell_renderer_toggle_set_active (GtkCellRenderer *toggle, bool setting);

unsigned long *g_signal_connect_data(void *ptr, const char *signal, GCallback handler, gpointer data, GCallback *destroy, int flags);
void g_object_unref(void *ptr);

//GtkDialogWindow
GtkWidget *gtk_dialog_new (void);
GtkWidget *gtk_dialog_new_with_buttons (const char *title, GtkWidget *parent,int flags,const char *first_button_text,...);
int gtk_dialog_run (GtkWidget *dialog);
void gtk_dialog_response (GtkWidget *dialog,int response_id);
GtkWidget * gtk_dialog_add_button (GtkWidget *dialog,const char *button_text,int response_id);
void gtk_dialog_add_action_widget (GtkWidget *dialog,GtkWidget *child,int response_id);
void gtk_dialog_set_default_response (GtkWidget *dialog,int response_id);
GtkWidget* gtk_message_dialog_new (GtkWidget *parent, GtkDialogFlags  flags, GtkMessageType  type, GtkButtonsType  buttons, const gchar    *message_format, ...);
GtkWidget* gtk_message_dialog_new_with_markup (GtkWidget *parent, GtkDialogFlags  flags, GtkMessageType  type, GtkButtonsType  buttons, const gchar    *message_format, ...);
void gtk_message_dialog_set_markup (GtkWidget *message_dialog, const gchar *str);
void gtk_message_dialog_set_image (GtkWidget *dialog,  GtkWidget *image);
GtkWidget *gtk_message_dialog_get_image (GtkWidget *dialog);
GtkWidget *gtk_message_dialog_get_message_area (GtkWidget *message_dialog);

//GtkWindow 
GtkWidget *gtk_window_new(GtkWindowType);
void gtk_window_set_title(GtkWidget *win, const char *title);
void gtk_window_set_default_size(GtkWidget *win, int width, int height);
const char *gtk_window_get_title(GtkWidget *Win);
void gtk_window_set_modal(GtkWidget *, bool);
bool gtk_window_get_modal(GtkWidget *);
void gtk_window_get_default_size(GtkWidget *window, int *width, int *height);
void gtk_window_set_position(GtkWidget *, GtkWindowPosition);
void gtk_window_get_position(GtkWidget *window, int *root_x, int *root_y);
void gtk_window_set_transient_for(GtkWidget *, GtkWidget *);
void gtk_window_set_attached_to(GtkWidget *, GtkWidget *);
void gtk_window_set_destroy_with_parent(GtkWidget *, bool);
void gtk_window_set_hide_titlebar_when_maximized(GtkWidget *, bool);

//GtkApplication GtkWindow
GtkApplication *gtk_application_new(const char *app_id, int flags);
GtkWidget *gtk_application_window_new(GtkApplication *app);
int g_application_run(GtkApplication *app, int argc, char **argv);
void gtk_application_window_set_show_menubar(GtkWidget *window, bool show_menubar);

//GtkScrollWindow
GtkWidget *gtk_scrolled_window_new(GtkAdjustment *hadjustment, GtkAdjustment *vadjustment);
void gtk_scrolled_window_set_policy(GtkWidget *scrolled_window, int hscrollbar_policy, int vscrollbar_policy);

//GtkButton
GtkWidget *gtk_button_new_with_label(const char *label);
GtkWidget *gtk_button_box_new(GtkOrientation orientation);
GtkWidget *gtk_button_new_from_icon_name(const gchar *icon_name, GtkIconSize size);
void gtk_button_clicked(GtkWidget *button);
void gtk_button_set_label(GtkWidget *button, const gchar *label);
void gtk_button_set_image(GtkWidget  *button, GtkWidget      *image);
GtkWidget* gtk_button_get_image(GtkWidget *button);
void gtk_button_set_image_position (GtkWidget *button, GtkPositionType position);
GtkPositionType gtk_button_get_image_position (GtkWidget *button);

//GtkCheckButton
GtkWidget *gtk_check_button_new(void);
GtkWidget *gtk_check_button_new_with_label(const gchar *label);

//GtkToggleButton
bool gtk_toggle_button_get_active(GtkWidget *toggle_button);

//GtkBuilder
GtkBuilder *gtk_builder_new(void);
GtkBuilder *gtk_builder_new_from_file(const char *filename);
GtkBuilder *gtk_builder_new_from_resource(const char *resource_path);
GtkBuilder *gtk_builder_new_from_string(const char *string, signed long length);
void gtk_builder_add_callback_symbol(GtkBuilder *builder, const char *callback_name, GCallback callback_symbol);
void gtk_builder_add_callback_symbols(GtkBuilder *builder, const char *first_callback_name, GCallback first_callback_symbol, ...);
GCallback gtk_builder_lookup_callback_symbol(GtkBuilder *builder, const char *callback_name);
unsigned int gtk_builder_add_from_file(GtkBuilder *builder, const char *filename, const char *error);
unsigned int gtk_builder_add_from_resource(GtkBuilder *builder, const char *resource_path, const char *error);
unsigned int gtk_builder_add_from_string(GtkBuilder *builder, const char *buffer, unsigned long length, const char *error);
unsigned int gtk_builder_add_objects_from_file(GtkBuilder *builder, const char *filename, char **object_ids, const char *error);
unsigned int gtk_builder_add_objects_from_string(GtkBuilder *builder, const char *buffer, unsigned long length, char **object_ids, const char*error);
unsigned int gtk_builder_add_objects_from_resource(GtkBuilder *builder, const char *resource_path, char **object_ids, const char *error);
GtkWidget *gtk_builder_get_object(GtkBuilder *builder, const char *name);
void gtk_builder_expose_object(GtkBuilder *builder, const char *name, GObject *object);
void gtk_builder_connect_signals(GtkBuilder *builder, void* user_data);
void gtk_builder_connect_signals_full(GtkBuilder *builder, GtkBuilderConnectFunc func, void* user_data);
void gtk_builder_set_translation_domain(GtkBuilder *builder, const char *domain);
const char *gtk_builder_get_translation_domain(GtkBuilder *builder);
void gtk_builder_set_application(GtkBuilder *builder, GtkApplication *application);
GtkApplication *gtk_builder_get_application(GtkBuilder *builder);

//GtkNoteBook
GtkWidget * gtk_notebook_new  (void);
int gtk_notebook_append_page (GtkWidget *notebook, GtkWidget   *child, GtkWidget   *tab_label);
int gtk_notebook_append_page_menu  (GtkWidget *notebook, GtkWidget   *child, GtkWidget   *tab_label, GtkWidget   *menu_label);
int gtk_notebook_prepend_page      (GtkWidget *notebook, GtkWidget   *child, GtkWidget   *tab_label);
int gtk_notebook_prepend_page_menu (GtkWidget *notebook, GtkWidget   *child, GtkWidget   *tab_label, GtkWidget   *menu_label);
int gtk_notebook_insert_page       (GtkWidget *notebook, GtkWidget   *child, GtkWidget   *tab_label, int position);
int gtk_notebook_insert_page_menu  (GtkWidget *notebook, GtkWidget   *child, GtkWidget   *tab_label, GtkWidget   *menu_label, int position);
void gtk_notebook_remove_page       (GtkWidget *notebook, int page_num);
void gtk_notebook_set_group_name (GtkWidget *notebook, const gchar *group_name);
const gchar *gtk_notebook_get_group_name (GtkWidget *notebook);
int       gtk_notebook_get_current_page (GtkWidget *notebook);
GtkWidget* gtk_notebook_get_nth_page     (GtkWidget *notebook, int page_num);
int       gtk_notebook_get_n_pages      (GtkWidget *notebook);
int       gtk_notebook_page_num         (GtkWidget *notebook, GtkWidget   *child);
void       gtk_notebook_set_current_page (GtkWidget *notebook, int page_num);
void       gtk_notebook_next_page        (GtkWidget *notebook);
void       gtk_notebook_prev_page        (GtkWidget *notebook);
void     gtk_notebook_set_show_border    (GtkWidget *notebook, bool show_border);
bool gtk_notebook_get_show_border      (GtkWidget     *notebook);
void     gtk_notebook_set_show_tabs        (GtkWidget     *notebook, bool show_tabs);
bool gtk_notebook_get_show_tabs        (GtkWidget     *notebook);
void     gtk_notebook_set_tab_pos          (GtkWidget     *notebook,
				GtkPositionType  pos);
GtkPositionType gtk_notebook_get_tab_pos   (GtkWidget     *notebook);
void     gtk_notebook_set_scrollable       (GtkWidget     *notebook,
					    bool         scrollable);
bool gtk_notebook_get_scrollable       (GtkWidget     *notebook);
void gtk_notebook_popup_enable  (GtkWidget *notebook);
void gtk_notebook_popup_disable (GtkWidget *notebook);
GtkWidget * gtk_notebook_get_tab_label    (GtkWidget *notebook,
					   GtkWidget   *child);
void gtk_notebook_set_tab_label           (GtkWidget *notebook,
					   GtkWidget   *child,
					   GtkWidget   *tab_label);
void          gtk_notebook_set_tab_label_text (GtkWidget *notebook,
           GtkWidget   *child,
           const gchar *tab_text);
const gchar * gtk_notebook_get_tab_label_text (GtkWidget *notebook,
           GtkWidget   *child);
GtkWidget * gtk_notebook_get_menu_label   (GtkWidget *notebook,
					   GtkWidget   *child);
void gtk_notebook_set_menu_label          (GtkWidget *notebook,
					   GtkWidget   *child,
					   GtkWidget   *menu_label);
void          gtk_notebook_set_menu_label_text (GtkWidget *notebook,
GtkWidget   *child,
const gchar *menu_text);
const gchar * gtk_notebook_get_menu_label_text (GtkWidget *notebook,
							GtkWidget   *child);
void gtk_notebook_reorder_child           (GtkWidget *notebook,
					   GtkWidget   *child,
					   int         position);
bool gtk_notebook_get_tab_reorderable (GtkWidget *notebook,
					   GtkWidget   *child);
void gtk_notebook_set_tab_reorderable     (GtkWidget *notebook,
					   GtkWidget   *child,
					   bool     reorderable);
bool gtk_notebook_get_tab_detachable  (GtkWidget *notebook,
					   GtkWidget   *child);
void gtk_notebook_set_tab_detachable      (GtkWidget *notebook,
					   GtkWidget   *child,
					   bool     detachable);
void gtk_notebook_detach_tab  (GtkWidget *notebook,
       GtkWidget   *child);
GtkWidget* gtk_notebook_get_action_widget (GtkWidget *notebook,
       GtkPackType  pack_type);
void       gtk_notebook_set_action_widget (GtkWidget *notebook,
       GtkWidget   *widget,
       GtkPackType  pack_type);
//GtkCalendar
typedef enum {
  GTK_CALENDAR_SHOW_HEADING		= 1 << 0,
  GTK_CALENDAR_SHOW_DAY_NAMES		= 1 << 1,
  GTK_CALENDAR_NO_MONTH_CHANGE		= 1 << 2,
  GTK_CALENDAR_SHOW_WEEK_NUMBERS	= 1 << 3,
  GTK_CALENDAR_SHOW_DETAILS		= 1 << 5
} GtkCalendarDisplayOptions;
GtkWidget* gtk_calendar_new (void);
void gtk_calendar_select_month (GtkWidget *calendar, guint month, guint year);
void gtk_calendar_select_day (GtkWidget *calendar, guint day);
void gtk_calendar_mark_day (GtkWidget *calendar, guint day);
void gtk_calendar_set_display_options (GtkWidget *calendar, GtkCalendarDisplayOptions flags);
GtkCalendarDisplayOptions gtk_calendar_get_display_options (GtkWidget *calendar);
void gtk_calendar_get_date (GtkWidget *calendar, guint *year, guint *month, guint *day);
bool   gtk_calendar_get_day_is_marked (GtkWidget *calendar, guint day);

//Accel-Label
GtkWidget *gtk_accel_label_new(const char *string);
GtkWidget *gtk_accel_label_get_accel_widget(GtkWidget *accel_label);
void gtk_accel_label_set_accel_widget(GtkWidget *accel_label, GtkWidget *accel_widget);
bool gtk_accel_label_refetch(GtkWidget *accel_label);
unsigned int gtk_accel_label_get_accel_width(GtkWidget *accel_label);

//Gtk-Spinner
GtkWidget *gtk_spinner_new(void);
void gtk_spinner_start(GtkWidget *spinner);
void gtk_spinner_stop(GtkWidget *spinner);

//GtkBox
GtkWidget *gtk_box_new(int orientation, int space);
void  gtk_box_pack_start (GtkWidget *box, GtkWidget *child, bool expand, bool fill, guint padding);
void gtk_box_pack_end (GtkWidget *box, GtkWidget *child, bool expand, bool fill, guint padding);
int gtk_box_get_spacing (GtkWidget *box);
void gtk_box_set_spacing (GtkWidget *box, int spacing);

//container 
void gtk_container_add(GtkWidget *widgetObj, GtkWidget *child);
void gtk_container_remove(GtkWidget *container, GtkWidget *widget);
unsigned int gtk_container_get_border_width(GtkWidget *container);
void gtk_container_set_border_width(GtkWidget *container, unsigned int border_width);

//GtkTextTag
GtkTextTag *gtk_text_tag_new(const char *name);
int gtk_text_tag_get_priority (GtkTextTag *tag);
void gtk_text_tag_set_priority (GtkTextTag *tag,int priority);
bool gtk_text_tag_event (GtkTextTag *tag,GObject *event_object,GdkEvent *event,const GtkTextIter *iter);
//GtkTextTagTable
GtkTextTagTable *gtk_text_tag_table_new(void);
bool gtk_text_tag_table_add(GtkTextTagTable *table, GtkTextTag *tag);
void gtk_text_tag_table_remove(GtkTextTagTable *table, GtkTextTag *tag);
GtkTextTag * gtk_text_tag_table_lookup(GtkTextTagTable *table, const char *name);
//void gtk_text_tag_table_foreach (GtkTextTagTable *table, GtkTextTagTableForeach func, void* data);
int gtk_text_tag_table_get_size(GtkTextTagTable *table);

//GtkTextBuffer
GtkTextBuffer *gtk_text_buffer_new(GtkTextTagTable *table);
int gtk_text_buffer_get_line_count(GtkTextBuffer *buffer);
int gtk_text_buffer_get_char_count(GtkTextBuffer *buffer);
GtkTextTagTable *gtk_text_buffer_get_tag_table(GtkTextBuffer *buffer);
void gtk_text_buffer_insert(GtkTextBuffer *buffer, int *iter, const char *text);
GtkTextBuffer *gtk_text_iter_get_buffer(int *iter);
void gtk_text_buffer_insert_at_cursor(GtkTextBuffer *buffer, const char *text, int len);
bool gtk_text_buffer_insert_interactive(GtkTextBuffer *buffer,int *iter,const char *text,int len,bool default_editable);
bool gtk_text_buffer_insert_interactive_at_cursor(GtkTextBuffer *buffer,const char *text,int len,bool default_editable);
void gtk_text_buffer_insert_range(GtkTextBuffer *buffer,int *iter,int *start,int *end);
bool gtk_text_buffer_insert_range_interactive(GtkTextBuffer *buffer,int *iter,int *start,int *end,bool default_editable);

//GtkTextView
GtkWidget *gtk_text_view_new(void);
GtkWidget *gtk_text_view_new_with_buffer(GtkTextBuffer *buffer);
void gtk_text_view_set_buffer(GtkWidget *text_view, GtkTextBuffer *buffer);
GtkTextBuffer *gtk_text_view_get_buffer(GtkWidget *text_view);
void gtk_text_view_scroll_to_mark (GtkWidget *text_view,GtkTextMark *mark,double within_margin,bool use_align,double xalign,double yalign);
bool gtk_text_view_scroll_to_iter (GtkWidget *text_view,GtkTextIter *iter,double within_margin,bool use_align,double xalign,double yalign);
void gtk_text_view_scroll_mark_onscreen (GtkWidget *text_view,GtkTextMark *mark);
bool gtk_text_view_move_mark_onscreen (GtkWidget   *text_view, GtkTextMark   *mark);
bool gtk_text_view_place_cursor_onscreen (GtkWidget   *text_view);
void gtk_text_view_get_visible_rect      (GtkWidget   *text_view, GdkRectangle  *visible_rect);
void gtk_text_view_set_cursor_visible    (GtkWidget   *text_view,bool       setting);
bool gtk_text_view_get_cursor_visible    (GtkWidget   *text_view);
void gtk_text_view_reset_cursor_blink    (GtkWidget   *text_view);
void gtk_text_view_get_cursor_locations  (GtkWidget       *text_view,
    const GtkTextIter *iter,
    GdkRectangle      *strong,
    GdkRectangle      *weak);
void           gtk_text_view_get_iter_location     (GtkWidget   *text_view,
    const GtkTextIter *iter,
    GdkRectangle  *location);
bool       gtk_text_view_get_iter_at_location  (GtkWidget   *text_view,
    GtkTextIter   *iter,
    int           x,
    int           y);
bool       gtk_text_view_get_iter_at_position  (GtkWidget   *text_view,
    GtkTextIter   *iter,
						    int          *trailing,
    int           x,
    int           y);
void           gtk_text_view_get_line_yrange       (GtkWidget       *text_view,
    const GtkTextIter *iter,
    int  *y,
    int  *height);

void           gtk_text_view_get_line_at_y         (GtkWidget       *text_view,
    GtkTextIter       *target_iter,
    int   y,
    int  *line_top);
void gtk_text_view_buffer_to_window_coords (GtkWidget       *text_view,
        int  win,
        int   buffer_x,
        int   buffer_y,
        int  *window_x,
        int  *window_y);

void gtk_text_view_window_to_buffer_coords (GtkWidget       *text_view,
        int  win,
        int   window_x,
        int   window_y,
        int  *buffer_x,
        int  *buffer_y);


GdkWindow*        gtk_text_view_get_window      (GtkWidget       *text_view,
 int  win);

int gtk_text_view_get_window_type (GtkWidget       *text_view,
 GdkWindow         *window);


void gtk_text_view_set_border_window_size (GtkWidget       *text_view,
       int  type,
       int   size);

int gtk_text_view_get_border_window_size (GtkWidget       *text_view,
					   int  type);


bool gtk_text_view_forward_display_line           (GtkWidget       *text_view,
       GtkTextIter       *iter);

bool gtk_text_view_backward_display_line          (GtkWidget       *text_view,
       GtkTextIter       *iter);

bool gtk_text_view_forward_display_line_end       (GtkWidget       *text_view,
       GtkTextIter       *iter);

bool gtk_text_view_backward_display_line_start    (GtkWidget       *text_view,
       GtkTextIter       *iter);

bool gtk_text_view_starts_display_line(GtkWidget       *text_view,
       const GtkTextIter *iter);

bool gtk_text_view_move_visually      (GtkWidget       *text_view,
       GtkTextIter       *iter,
       int   count);


bool        gtk_text_view_im_context_filter_keypress        (GtkWidget       *text_view,
     GdkEventKey       *event);

void            gtk_text_view_reset_im_context      (GtkWidget       *text_view);

/* Adding child widgets */

void gtk_text_view_add_child_at_anchor (GtkWidget *text_view,GtkWidget*child, GtkTextChildAnchor   *anchor);
GtkTextChildAnchor *gtk_text_child_anchor_new (void);
void gtk_text_view_add_child_in_window (GtkWidget *text_view, GtkWidget *child, int which_window,int xpos,int  ypos);
void gtk_text_view_move_child          (GtkWidget          *text_view,
                                        GtkWidget            *child,
                                        int                  xpos,
                                        int                  ypos);
void             gtk_text_view_set_wrap_mode          (GtkWidget      *text_view,
                                                       int       wrap_mode);
int      gtk_text_view_get_wrap_mode          (GtkWidget      *text_view);
void             gtk_text_view_set_editable           (GtkWidget      *text_view,
                                                       bool          setting);
bool         gtk_text_view_get_editable           (GtkWidget      *text_view);
void             gtk_text_view_set_overwrite          (GtkWidget      *text_view,
						       bool          overwrite);
bool         gtk_text_view_get_overwrite          (GtkWidget      *text_view);
void		 gtk_text_view_set_accepts_tab        (GtkWidget	*text_view,bool accepts_tab);
bool	 gtk_text_view_get_accepts_tab        (GtkWidget	*text_view);
void             gtk_text_view_set_pixels_above_lines (GtkWidget      *text_view,int pixels_above_lines);
int             gtk_text_view_get_pixels_above_lines (GtkWidget      *text_view);
void             gtk_text_view_set_pixels_below_lines (GtkWidget      *text_view,int pixels_below_lines);
int             gtk_text_view_get_pixels_below_lines (GtkWidget      *text_view);
void             gtk_text_view_set_pixels_inside_wrap (GtkWidget      *text_view,int pixels_inside_wrap);
int             gtk_text_view_get_pixels_inside_wrap (GtkWidget      *text_view);
void    gtk_text_view_set_justification      (GtkWidget      *text_view,int  justification);
int gtk_text_view_get_justification (GtkWidget      *text_view);
void  gtk_text_view_set_left_margin (GtkWidget  *text_view, int left_margin);
int gtk_text_view_get_left_margin        (GtkWidget      *text_view);
void gtk_text_view_set_right_margin       (GtkWidget      *text_view, int  right_margin);
int gtk_text_view_get_right_margin       (GtkWidget      *text_view);
void gtk_text_view_set_top_margin         (GtkWidget      *text_view, int  top_margin);
int gtk_text_view_get_top_margin         (GtkWidget      *text_view);
void gtk_text_view_set_bottom_margin      (GtkWidget      *text_view, int  bottom_margin);
int gtk_text_view_get_bottom_margin       (GtkWidget      *text_view);
void gtk_text_view_set_indent(GtkWidget      *text_view,int  indent);
int gtk_text_view_get_indent (GtkWidget      *text_view);
//void gtk_text_view_set_tabs   (GtkWidget      *text_view, PangoTabArray    *tabs);
//PangoTabArray*   gtk_text_view_get_tabs   (GtkWidget      *text_view);
/* note that the return value of this changes with the theme */
GtkTextAttributes* gtk_text_view_get_default_attributes (GtkWidget    *text_view);
void gtk_text_view_set_input_purpose      (GtkWidget      *text_view,int   purpose);
int  gtk_text_view_get_input_purpose      (GtkWidget      *text_view);
void gtk_text_view_set_input_hints        (GtkWidget      *text_view,int     hints);
int   gtk_text_view_get_input_hints        (GtkWidget      *text_view);
void gtk_text_view_set_monospace          (GtkWidget      *text_view,bool          monospace);
bool         gtk_text_view_get_monospace          (GtkWidget      *text_view);


//GtkTextMark
GtkTextMark *gtk_text_mark_new (const gchar *name,bool left_gravity);
void gtk_text_mark_set_visible (GtkTextMark *mark,bool setting);
bool gtk_text_mark_get_visible (GtkTextMark *mark);
bool gtk_text_mark_get_deleted (GtkTextMark *mark);
const char *gtk_text_mark_get_name (GtkTextMark *mark);
GtkTextBuffer *gtk_text_mark_get_buffer (GtkTextMark *mark);
bool gtk_text_mark_get_left_gravity (GtkTextMark *mark);

//GtkImage
typedef enum {
  GTK_IMAGE_EMPTY,
  GTK_IMAGE_PIXBUF,
  GTK_IMAGE_STOCK,
  GTK_IMAGE_ICON_SET,
  GTK_IMAGE_ANIMATION,
  GTK_IMAGE_ICON_NAME,
  GTK_IMAGE_GICON
} GtkImageType;

GtkWidget *gtk_image_new();
GtkWidget *gtk_image_new_from_file(const char *filename);
GtkWidget *gtk_image_new_from_icon_name(const char *icon_name, int size);
GtkWidget *gtk_image_new_from_resource(const char *resource_path);
void gtk_image_set_from_file(GtkWidget *gtkImage, const char *filename);
//GdkPixbuf *gtk_image_get_pixbuf (GtkImage *image);
void gtk_image_set_from_pixbuf(GtkWidget *gtkImage, GdkPixbuf *pixbuf);
//GdkPixbufAnimation *gtk_image_get_animation (GtkImage *image);
//void gtk_image_set_from_animation (GtkWidget *gtkImage,GdkPixbufAnimation *animation);
//void gtk_image_get_icon_name (GtkImage *image, const char *icon_name, int size);
void gtk_image_set_from_icon_name(GtkWidget *gtkImage, const char *icon_name, int size);
void gtk_image_set_from_resource(GtkWidget *gtkImage, const char *resource_path);
void gtk_image_clear(GtkWidget *gtkImage);
void gtk_image_set_pixel_size(GtkWidget *gtkImage, int pixel_size);
int gtk_image_get_pixel_size(GtkWidget *gtkImage);
//GtkImageType gtk_image_get_storage_type (GtkImage *image);
//info bar widget
GtkWidget * gtk_info_bar_new(void);
GtkWidget *gtk_info_bar_new_with_buttons(const char *first_button_text, ...);
void gtk_info_bar_add_action_widget(GtkWidget *info_bar, GtkWidget *child, int response_id);
GtkWidget *gtk_info_bar_add_button(GtkWidget *info_bar, const char *button_text, int response_id);
void gtk_info_bar_add_buttons(GtkWidget *info_bar, const char *first_button_text, ...);
void gtk_info_bar_set_response_sensitive(GtkWidget *info_bar, int response_id, bool setting);
void gtk_info_bar_set_default_response(GtkWidget *info_bar, int response_id);
void gtk_info_bar_response(GtkWidget *info_bar, int response_id);
int gtk_info_bar_get_message_type(GtkWidget *info_bar);
GtkWidget *gtk_info_bar_get_action_area(GtkWidget *info_bar);
GtkWidget *gtk_info_bar_get_content_area(GtkWidget *info_bar);
bool gtk_info_bar_get_show_close_button(GtkWidget *info_bar);
void gtk_info_bar_set_show_close_button(GtkWidget *info_bar, bool setting);
void gtk_info_bar_set_message_type(GtkWidget *info_bar, int message_type);

//GtkProgressBar
GtkWidget *gtk_progress_bar_new(void);
void gtk_progress_bar_pulse(GtkWidget *pbar);
void gtk_progress_bar_set_fraction(GtkWidget *pbar, double fraction);
double gtk_progress_bar_get_fraction(GtkWidget *pbar);
void gtk_progress_bar_set_inverted(GtkWidget *pbar, bool inverted);
bool gtk_progress_bar_get_inverted(GtkWidget *pbar);
void gtk_progress_bar_set_show_text(GtkWidget *pbar, bool show_text);
bool gtk_progress_bar_get_show_text(GtkWidget *pbar);
void gtk_progress_bar_set_text(GtkWidget *pbar, const char *text);
const char *gtk_progress_bar_get_text(GtkWidget *pbar);
void gtk_progress_bar_set_pulse_step(GtkWidget *pbar, double fraction);
double gtk_progress_bar_get_pulse_step(GtkWidget *pbar);

//GtkLevelBar 
GtkWidget *gtk_level_bar_new(void);
GtkWidget *gtk_level_bar_new_for_interval(double min_value, double max_value);
void gtk_level_bar_set_mode(GtkWidget *gtkLevelbar, int mode);
int gtk_level_bar_get_mode(GtkWidget *gtkLevelbar);
void gtk_level_bar_set_value(GtkWidget *gtkLevelbar, double value);
double gtk_level_bar_get_value(GtkWidget *gtkLvelebar);
void gtk_level_bar_set_min_value(GtkWidget *gtkLevelbar, double value);
double gtk_level_bar_get_min_value(GtkWidget *gtkLevelbar);
void gtk_level_bar_set_max_value(GtkWidget *gtkLevelbar, double value);
double gtk_level_bar_get_max_value(GtkWidget *gtkLevelbar);
void gtk_level_bar_set_inverted(GtkWidget *gtkLevelbar, bool inverted);
bool gtk_level_bar_get_inverted(GtkWidget *gtkLevelbar);
void gtk_level_bar_add_offset_value(GtkWidget *gtkLevelbar, const char *name, double value);
void gtk_level_bar_remove_offset_value(GtkWidget *gtkLevelbar, const char *name);
bool gtk_level_bar_get_offset_value(GtkWidget *gtkLevelbar, const char *name, double *value);

//GtkStatusbar
GtkWidget *gtk_statusbar_new(void);
unsigned int gtk_statusbar_get_context_id(GtkWidget *statusBar, const char *context_desc);
unsigned int gtk_statusbar_push(GtkWidget *statusBar, unsigned int context_id, const char *text);
void gtk_statusbar_pop(GtkWidget *statusBar, unsigned int context_id);
void gtk_statusbar_remove(GtkWidget *statusBar, unsigned int context_id, unsigned int message_id);
void gtk_statusbar_remove_all(GtkWidget *statusBar, unsigned int context_id);
GtkWidget *gtk_statusbar_get_message_area(GtkWidget *statusBar);

//GtkLabel
GtkWidget *gtk_label_new(const char *string);
void gtk_label_set_text(GtkWidget *label, const char *string);
void gtk_label_set_attributes(GtkWidget *label, int attrs);
void gtk_label_set_markup(GtkWidget *label, const char *string);
void gtk_label_set_markup_with_mnemonic(GtkWidget *label, const char *string);
void gtk_label_set_pattern(GtkWidget *label, const char *string);
void gtk_label_set_justify(GtkWidget *label, int jtype);
void gtk_label_set_xalign(GtkWidget *label, float xalgin);
void gtk_label_set_yalign(GtkWidget *label, float yalgin);
void gtk_label_set_width_chars(GtkWidget *label, int n_chars);
void gtk_label_set_max_width_chars(GtkWidget *label, int n_chars);
void gtk_label_set_line_wrap(GtkWidget *label, bool wrap);
void gtk_label_set_line_wrap_mode(GtkWidget *label, int wrap_mode);
void gtk_label_set_lines(GtkWidget *label, int lines);
void gtk_label_get_layout_offsets(GtkWidget *label, int *x, int *y);
unsigned int gtk_label_get_mnemonic_keyval(GtkWidget *label);
bool gtk_label_get_selectable(GtkWidget *label);
const char * gtk_label_get_text(GtkWidget *label);
GtkWidget * gtk_label_new_with_mnemonic(const char *string);
void gtk_label_select_region(GtkWidget *label, int start_offset, int end_offset);
void gtk_label_set_mnemonic_widget(GtkWidget *label, GtkWidget *gtkWidget);
void gtk_label_set_selectable(GtkWidget *label, bool setting);
void gtk_label_set_text_with_mnemonic(GtkWidget *label, const char *string);

//PangoAttrList * gtk_label_get_attributes (GtkWidget *label);
unsigned int gtk_label_get_justify(GtkWidget *label);
float gtk_label_get_xalign(GtkWidget *label);
float gtk_label_get_yalign(GtkWidget *label);

//PangoEllipsizeMode gtk_label_get_ellipsize (GtkWidget *label);
int gtk_label_get_width_chars(GtkWidget *label);
int gtk_label_get_max_width_chars(GtkWidget *label);
const char * gtk_label_get_label(GtkWidget *label);

//PangoLayout * gtk_label_get_layout (GtkWidget *label);
bool gtk_label_get_line_wrap(GtkWidget *label);

//PangoWrapMode gtk_label_get_line_wrap_mode (GtkWidget *label);
int gtk_label_get_lines(GtkWidget *label);
GtkWidget * gtk_label_get_mnemonic_widget(GtkWidget *label);
bool gtk_label_get_selection_bounds(GtkWidget *label, int *start, int *end);
bool gtk_label_get_use_markup(GtkWidget *label);
bool gtk_label_get_use_underline(GtkWidget *label);
bool gtk_label_get_single_line_mode(GtkWidget *label);
double gtk_label_get_angle(GtkWidget *label);
void gtk_label_set_label(GtkWidget *label, const char *string);
void gtk_label_set_use_markup(GtkWidget *label, bool setting);
void gtk_label_set_use_underline(GtkWidget *label, bool setting);
void gtk_label_set_single_line_mode(GtkWidget *label, bool single_line_mode);
void gtk_label_set_angle(GtkWidget *label, double angle);
const char *gtk_label_get_current_uri(GtkWidget *label);
void gtk_label_set_track_visited_links(GtkWidget *label, bool trac_links);
bool gtk_label_get_track_visited_links(GtkWidget *label);


//GtkScrollbar
GtkWidget *gtk_scrollbar_new(int orientatioin, GtkAdjustment *adjustment);
//GtkSpinner
GtkWidget *gtk_spinner_new (void);
void gtk_spinner_start (GtkWidget *spinner);
void gtk_spinner_stop (GtkWidget *spinner);

//GtkAdjustment
GtkAdjustment *gtk_adjustment_new(double value, double lower, double upper, double step_increment, double page_increment, double page_size);

//GtkSeparator
GtkWidget *gtk_separator_new(int orientation);

const char *gtk_actionable_get_action_name(GtkActionable *actionable);
void gtk_actionable_set_action_name(GtkActionable *actionable, const char *action_name);
void gtk_box_pack_start(GtkWidget *box, GtkWidget *child, bool expand, bool fill, guint padding);
void gtk_box_pack_end(GtkWidget *box, GtkWidget *child, bool expand, bool fill, guint padding);

void gtk_main(void);
void gtk_init(int *argc, char ***argv);
void gtk_main_quit(void);

void gtk_window_fullscreen(GtkWidget *window);
void gtk_window_unfullscreen(GtkWidget *window);
void gtk_window_maximize(GtkWidget *window);
void gtk_window_unmaximize(GtkWidget *window);

/* GtkAlignment */
typedef struct {
} GtkAlignment;

GtkAlignment * gtk_alignment_new(gfloat xalign, gfloat yalign, gfloat xscale, gfloat yscale);
void gtk_alignment_set(GtkAlignment *alignment, gfloat xalign, gfloat yalign, gfloat xscale, gfloat yscale);
void gtk_alignment_get_padding(GtkAlignment *alignment, guint *padding_top, guint *padding_bottom, guint *padding_left, guint *padding_right);
void gtk_alignment_set_padding(GtkAlignment *alignment, guint padding_top, guint padding_bottom, guint padding_left, guint padding_right);

/* GtkEventBox */
typedef struct {
} GtkEventBox;

GtkWidget * gtk_event_box_new(void);

/* GtkOffscreenWindow */
typedef struct {
} GtkOffscreenWindow;
GtkOffscreenWindow * gtk_offscreen_window_new(void);

/* GtkEntry */
typedef struct {
} GtkEntry;
GtkWidget * gtk_entry_new(void);

/* GtkDrawingArea */
typedef struct {
} GtkDrawingArea;
GtkWidget * gtk_drawing_area_new(void);

/* GtkScrolledWindow */

GtkAdjustment * gtk_scrolled_window_get_hadjustment(GtkWidget *scrolled_window);
void gtk_scrolled_window_set_hadjustment(GtkWidget *scrolled_window, GtkAdjustment *hadjustment);
GtkAdjustment * gtk_scrolled_window_get_vadjustment(GtkWidget *scrolled_window);
void gtk_scrolled_window_set_vadjustment(GtkWidget *scrolled_window, GtkAdjustment *vadjustment);

/* GtkViewport */
typedef struct {
} GtkViewport;

GtkViewport * gtk_viewport_new(GtkAdjustment *hadjustment, GtkAdjustment *vadjustment);

/* GtkSettings */
typedef struct {
} GtkSettings;

typedef struct _GdkScreen GdkScreen;
GtkSettings * gtk_settings_get_default(void);
GtkSettings * gtk_settings_get_for_screen(GdkScreen *screen);

typedef struct _cairo cairo_t;
bool gtk_cairo_should_draw_window(cairo_t *cr, GdkWindow *window);
const gchar * gtk_check_version(guint required_major, guint required_minor, guint required_micro);
GType g_type_from_name(const gchar *name);
void g_type_ensure(GType type);
GTypeInstance* g_type_check_instance_cast(GTypeInstance *instance, GType iface_type);
GType gtk_widget_get_type(void);

typedef struct _GTypeClass GTypeClass;

typedef struct _GTypeClass {
    GType g_type;
} GTypeClass;

typedef enum {
    G_CONNECT_AFTER = 1 << 0,
    G_CONNECT_SWAPPED = 1 << 1
} GConnectFlags;

gulong g_signal_connect_object(gpointer instance, const gchar *detailed_signal, GCallback c_handler, gpointer gobject, GConnectFlags connect_flags);

typedef void *GClosureNotify(gpointer data, GClosure *closure);

typedef enum {
    G_SIGNAL_RUN_FIRST = 1 << 0,
    G_SIGNAL_RUN_LAST = 1 << 1,
    G_SIGNAL_RUN_CLEANUP = 1 << 2,
    G_SIGNAL_NO_RECURSE = 1 << 3,
    G_SIGNAL_DETAILED = 1 << 4,
    G_SIGNAL_ACTION = 1 << 5,
    G_SIGNAL_NO_HOOKS = 1 << 6,
    G_SIGNAL_MUST_COLLECT = 1 << 7,
    G_SIGNAL_DEPRECATED = 1 << 8
} GSignalFlags;

typedef struct {
    guint signal_id;
    const gchar *signal_name;
    GType itype;
    GSignalFlags signal_flags;
    GType return_type; /* mangled with G_SIGNAL_TYPE_STATIC_SCOPE flag */
    guint n_params;
    const GType *param_types; /* mangled with G_SIGNAL_TYPE_STATIC_SCOPE flag */
} GSignalQuery;

guint g_signal_lookup(const gchar *name, GType itype);
void g_signal_query(guint signal_id, GSignalQuery *query);
GClosure *g_cclosure_new_swap(GCallback callback_func, gpointer user_data, GClosureNotify destroy_data);
gulong g_signal_connect_closure(gpointer instance, const gchar *detailed_signal, GClosure *closure, bool after);


GType g_type_fundamental(GType type_id);
const gchar *g_type_name(GType type);

// GTKENTRY

typedef enum {
    GTK_ENTRY_ICON_PRIMARY,
    GTK_ENTRY_ICON_SECONDARY
} GtkEntryIconPosition;

typedef struct _GtkEntryClass GtkEntryClass;





// GType gtk_entry_get_type (void);
// GtkWidget* gtk_entry_new_with_buffer (GtkEntryBuffer *buffer);
// GtkEntryBuffer* gtk_entry_get_buffer (GtkEntry *entry);
// void gtk_entry_set_buffer (GtkEntry *entry, GtkEntryBuffer *buffer);
void gtk_entry_set_visibility(GtkWidget *entry, bool visible);
bool gtk_entry_get_visibility(GtkWidget *entry);
void gtk_entry_set_invisible_char(GtkWidget *entry, gunichar ch);
gunichar gtk_entry_get_invisible_char(GtkWidget *entry);
void gtk_entry_unset_invisible_char(GtkWidget *entry);
void gtk_entry_set_has_frame(GtkWidget *entry, bool setting);
bool gtk_entry_get_has_frame(GtkWidget *entry);
void gtk_entry_set_overwrite_mode(GtkWidget *entry, bool overwrite);
bool gtk_entry_get_overwrite_mode(GtkWidget *entry);
void gtk_entry_set_max_length(GtkWidget *entry, int max);
int gtk_entry_get_max_length(GtkWidget *entry);
guint16 gtk_entry_get_text_length(GtkWidget *entry);
void gtk_entry_set_activates_default(GtkWidget *entry, bool setting);
bool gtk_entry_get_activates_default(GtkWidget *entry);
void gtk_entry_set_alignment(GtkWidget *entry, gfloat xalign);
gfloat gtk_entry_get_alignment(GtkWidget *entry);
// void gtk_entry_set_completion (GtkWidget *entry, GtkWidgetCompletion *completion);
// GtkWidgetCompletion *gtk_entry_get_completion (GtkWidget *entry);
void gtk_entry_set_progress_fraction(GtkWidget *entry, gdouble fraction);
gdouble gtk_entry_get_progress_fraction(GtkWidget *entry);
void gtk_entry_set_progress_pulse_step(GtkWidget *entry, gdouble fraction);
gdouble gtk_entry_get_progress_pulse_step(GtkWidget *entry);
void gtk_entry_progress_pulse(GtkWidget *entry);
const gchar* gtk_entry_get_placeholder_text(GtkWidget *entry);
void gtk_entry_set_placeholder_text(GtkWidget *entry, const gchar *text);
// void gtk_entry_set_icon_from_paintable (GtkWidget *entry, GtkWidgetIconPosition  icon_pos, GdkPaintable *paintable);
//void gtk_entry_set_icon_from_icon_name(GtkWidget *entry, GtkWidgetIconPosition icon_pos, const gchar *icon_name);
// void gtk_entry_set_icon_from_gicon (GtkWidget *entry, GtkWidgetIconPosition  icon_pos, GIcon *icon);
// GtkImageType gtk_entry_get_icon_storage_type (GtkWidget *entry, GtkWidgetIconPosition  icon_pos);
// GdkPaintable * gtk_entry_get_icon_paintable (GtkWidget *entry, GtkWidgetIconPosition  icon_pos);
//const gchar* gtk_entry_get_icon_name(GtkWidget *entry, GtkWidgetIconPosition icon_pos);
// GIcon* gtk_entry_get_icon_gicon (GtkWidget *entry, GtkWidgetIconPosition  icon_pos);
//void gtk_entry_set_icon_activatable(GtkWidget *entry, GtkWidgetIconPosition icon_pos, bool activatable);
//bool gtk_entry_get_icon_activatable(GtkWidget *entry, GtkWidgetIconPosition icon_pos);
//void gtk_entry_set_icon_sensitive(GtkWidget *entry, GtkWidgetIconPosition icon_pos, bool sensitive);
//bool gtk_entry_get_icon_sensitive(GtkWidget *entry, GtkWidgetIconPosition icon_pos);
//int gtk_entry_get_icon_at_pos(GtkWidget *entry, int x, int y);
//void gtk_entry_set_icon_tooltip_text(GtkWidget *entry, GtkWidgetIconPosition icon_pos, const gchar *tooltip);
//gchar * gtk_entry_get_icon_tooltip_text(GtkWidget *entry, GtkWidgetIconPosition icon_pos);
//void gtk_entry_set_icon_tooltip_markup(GtkWidget *entry, GtkWidgetIconPosition icon_pos, const gchar *tooltip);
//gchar * gtk_entry_get_icon_tooltip_markup(GtkWidget *entry, GtkWidgetIconPosition icon_pos);
// void gtk_entry_set_icon_drag_source (GtkWidget *entry, GtkWidgetIconPosition  icon_pos, GdkContentFormats *formats, GdkDragAction actions);
//int gtk_entry_get_current_icon_drag_source(GtkWidget *entry);
//void gtk_entry_get_icon_area (GtkWidget *entry, GtkWidgetIconPosition icon_pos, GdkRectangle *icon_area);
void gtk_entry_reset_im_context(GtkWidget *entry);
void gtk_entry_set_input_purpose (GtkWidget *entry, GtkInputPurpose purpose);
GtkInputPurpose gtk_entry_get_input_purpose (GtkWidget *entry);
// void gtk_entry_set_input_hints (GtkWidget *entry, GtkInputHints hints);
// GtkInputHints   gtk_entry_get_input_hints (GtkWidget *entry);
// void gtk_entry_set_attributes (GtkWidget *entry, PangoAttrList *attrs);
// PangoAttrList  *gtk_entry_get_attributes (GtkWidget *entry);
// void gtk_entry_set_tabs (GtkWidget *entry, PangoTabArray *tabs);
// PangoTabArray *gtk_entry_get_tabs (GtkWidget *entry);
bool gtk_entry_grab_focus_without_selecting(GtkWidget *entry);
// void gtk_entry_set_extra_menu (GtkWidget *entry, GMenuModel *model);
// GMenuModel * gtk_entry_get_extra_menu (GtkWidget *entry);


const gchar *gtk_entry_get_text(GtkWidget *entry);
void gtk_entry_set_text(GtkWidget *entry, const gchar *text);

typedef enum {
    GTK_FILE_CHOOSER_ACTION_OPEN,
    GTK_FILE_CHOOSER_ACTION_SAVE,
    GTK_FILE_CHOOSER_ACTION_SELECT_FOLDER,
    GTK_FILE_CHOOSER_ACTION_CREATE_FOLDER,
} GtkFileChooserAction;

GtkWidget* gtk_file_chooser_dialog_new (const gchar *title, GtkWidget *parent, GtkFileChooserAction action, const gchar *first_button_text, ...);

//GtkPaned
GtkWidget * gtk_paned_new (GtkOrientation orientation);
void
gtk_paned_add1 (GtkWidget *paned,
    GtkWidget *child);
void
gtk_paned_add2 (GtkWidget *paned,
    GtkWidget *child);
void gtk_paned_pack1 (GtkWidget *paned,GtkWidget *child,bool resize,bool shrink);
void gtk_paned_pack2 (GtkWidget *paned,GtkWidget *child,bool resize,bool shrink);
GtkWidget * gtk_paned_get_child1 (GtkWidget *paned);
GtkWidget * gtk_paned_get_child1 (GtkWidget *paned);
void gtk_paned_set_position (GtkWidget *paned,int position);
int gtk_paned_get_position (GtkWidget *paned);
void gtk_paned_set_wide_handle (GtkWidget *paned,bool wide);
bool gtk_paned_get_wide_handle (GtkWidget *paned);


