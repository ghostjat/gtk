#define FFI_SCOPE "webview"
#define FFI_LIB "libwebkit2gtk-4.0.so"

typedef struct GtkInternal GtkWidget;
typedef struct _GObject WebKitPermissionRequest;
typedef struct _WebKitWebView WebKitWebView;
typedef struct _GObject WebKitUserMediaPermissionRequest;
GtkWidget *webkit_web_view_new(void);
void webkit_web_view_load_uri(GtkWidget *web_view, const char *uri);
void webkit_permission_request_allow(WebKitPermissionRequest *reuest);
