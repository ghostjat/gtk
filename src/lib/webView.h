#define FFI_SCOPE "webview"
#define FFI_LIB "libwebkit2gtk-4.0.so.37.57.5"

typedef struct GtkInternal GtkWidget;
typedef struct _GObject WebKitPermissionRequest;
typedef struct _WebKitWebView WebKitWebView;
typedef struct _GObject WebKitUserMediaPermissionRequest;
typedef struct _WebKitSettings WebKitSettings;

typedef enum {
    WEBKIT_HARDWARE_ACCELERATION_POLICY_ON_DEMAND,
    WEBKIT_HARDWARE_ACCELERATION_POLICY_ALWAYS,
    WEBKIT_HARDWARE_ACCELERATION_POLICY_NEVER
} WebKitHardwareAccelerationPolicy;

GtkWidget *webkit_web_view_new(void);
GtkWidget* webkit_web_view_new_with_settings (WebKitSettings* settings)
void webkit_web_view_load_uri(GtkWidget *web_view, const char *uri);
void webkit_permission_request_allow(WebKitPermissionRequest *reuest);

WebKitSettings * webkit_settings_new (void);
WebKitSettings *webkit_settings_new_with_settings (const char *first_setting_name,...);
bool webkit_settings_get_auto_load_images (WebKitSettings *settings);
void webkit_settings_set_auto_load_images (WebKitSettings *settings,bool enabled);
bool webkit_settings_get_enable_frame_flattening (WebKitSettings *settings);
void webkit_settings_set_enable_frame_flattening(WebKitSettings *settings,bool enabled);
bool webkit_settings_get_enable_html5_database (WebKitSettings *settings);
void webkit_settings_set_enable_html5_database(WebKitSettings *settings,bool enabled);
bool webkit_settings_get_enable_html5_local_storage(WebKitSettings *settings);
void webkit_settings_set_enable_html5_local_storage(WebKitSettings *settings,bool enabled);
bool webkit_settings_get_enable_hyperlink_auditing(WebKitSettings *settings);
void webkit_settings_set_enable_hyperlink_auditing(WebKitSettings *settings,bool enabled);
bool webkit_settings_get_enable_java (WebKitSettings *settings);
void webkit_settings_set_enable_java (WebKitSettings *settings,bool enabled);
bool webkit_settings_get_enable_javascript (WebKitSettings *settings);
void webkit_settings_set_enable_javascript (WebKitSettings *settings,bool enabled);
bool webkit_settings_get_enable_offline_web_application_cache(WebKitSettings *settings);
void webkit_settings_set_enable_offline_web_application_cache(WebKitSettings *settings,bool enabled);
bool webkit_settings_get_enable_plugins (WebKitSettings *settings);
void webkit_settings_set_enable_plugins (WebKitSettings *settings,bool enabled);
bool webkit_settings_get_enable_xss_auditor(WebKitSettings *settings);
void webkit_settings_set_enable_xss_auditor(WebKitSettings *settings,bool enabled);
bool webkit_settings_get_javascript_can_open_windows_automatically(WebKitSettings *settings);
void webkit_settings_set_javascript_can_open_windows_automatically(WebKitSettings *settings,bool enabled);
bool webkit_settings_get_load_icons_ignoring_image_load_setting(WebKitSettings *settings);
void webkit_settings_set_load_icons_ignoring_image_load_setting(WebKitSettings *settings,bool enabled);
const char * webkit_settings_get_default_font_family (WebKitSettings *settings);
void webkit_settings_set_default_font_family (WebKitSettings *settings,const char *default_font_family);
const char * webkit_settings_get_monospace_font_family (WebKitSettings *settings);
void webkit_settings_set_monospace_font_family (WebKitSettings *settings,const char *monospace_font_family);
bool webkit_settings_get_enable_private_browsing (WebKitSettings *settings);
void webkit_settings_set_enable_private_browsing (WebKitSettings *settings,bool enabled);
bool webkit_settings_get_enable_developer_extras(WebKitSettings *settings);
void webkit_settings_set_enable_developer_extras (WebKitSettings *settings, bool enabled);
bool webkit_settings_get_enable_dns_prefetching (WebKitSettings *settings);
void webkit_settings_set_enable_dns_prefetching(WebKitSettings *settings,bool enabled);
bool webkit_settings_get_enable_fullscreen (WebKitSettings *settings);
void webkit_settings_set_enable_fullscreen (WebKitSettings *settings,bool enabled);
void webkit_settings_set_enable_tabs_to_links (WebKitSettings* settings,bool enabled);
void webkit_settings_set_hardware_acceleration_policy (WebKitSettings *settings,WebKitHardwareAccelerationPolicy policy);
