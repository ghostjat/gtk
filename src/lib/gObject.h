#define FFI_SCOPE "gObject"
#define FFI_LIB "libgobject-2.0.so"
/* GType */
typedef unsigned long gsize;
typedef gsize GType;
typedef char gchar;
typedef unsigned int guint;
typedef void* gpointer;
typedef int gint;
typedef gint gboolean;
typedef unsigned long gulong;
typedef struct _GValue GValue;
typedef struct _GClosure GClosure;
typedef void (*GClosureNotify) (gpointer data, GClosure *closure);
typedef void (*GClosureMarshal) (GClosure *closure, GValue *return_value, guint n_param_values, const GValue *param_values,
        gpointer invocation_hint, gpointer marshal_data);
typedef GClosureMarshal GSignalCMarshaller;

typedef void (*GCallback)(gpointer, gpointer);
typedef struct _GSignalInvocationHint GSignalInvocationHint;
typedef gboolean(*GSignalAccumulator) (GSignalInvocationHint *ihint, GValue *return_accu, const GValue *handler_return, gpointer data);

typedef struct {
    GType type;
    const gchar *type_name;
    guint class_size;
    guint instance_size;
} GTypeQuery;

const gchar *g_type_name(GType type);
GType g_type_from_name(const gchar *name);
gpointer g_type_class_ref(GType type);
void g_type_class_unref(gpointer g_class);
gboolean g_type_is_a(GType type, GType is_a_type);
gpointer g_type_default_interface_ref(GType g_type);
void g_type_default_interface_unref(gpointer g_iface);
void g_type_query(GType type, GTypeQuery *query);

/* GObject */
typedef struct {
} GObject;

GObject g_object_new(GType object_type);
gpointer g_object_ref(gpointer object);
gpointer g_object_ref_sink(gpointer object);
gboolean g_object_is_floating(gpointer object);
void g_object_unref(gpointer object);
void g_object_set(gpointer object,const gchar *first_property_name,...);
void g_object_get(gpointer object,const gchar *first_property_name,...);

/* signals */

typedef enum {
    G_CONNECT_AFTER = 1 << 0,
    G_CONNECT_SWAPPED = 1 << 1
} GConnectFlags;

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

gulong g_signal_connect_object(gpointer instance,
        const gchar *detailed_signal,
        GCallback c_handler,
        gpointer gobject,
        GConnectFlags connect_flags);

gulong g_signal_connect_data(gpointer instance,
        const gchar *detailed_signal,
        GCallback c_handler,
        gpointer data,
        GClosureNotify destroy_data,
        GConnectFlags connect_flags);

void g_signal_emit_by_name(gpointer instance, const gchar *detailed_signal, ...);
void g_signal_handler_disconnect(gpointer instance, gulong handler_id);
guint g_signal_lookup(const gchar *name, GType itype);
guint * g_signal_list_ids(GType itype, guint *n_ids);
void g_signal_query(guint signal_id, GSignalQuery *query);
guint g_signal_newv(const gchar *signal_name, GType itype, GSignalFlags signal_flags, GClosure *class_closure, GSignalAccumulator accumulator, gpointer accu_data, GSignalCMarshaller c_marshaller, GType return_type, guint n_params, GType *param_types);

