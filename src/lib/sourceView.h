#define FFI_SCOPE "sourceview"
#define FFI_LIB "libgtksourceview-4.so.0.0.0"

typedef char gchar;
typedef unsigned long gsize;
typedef gsize GType;
typedef int gboolean;
typedef struct _GObject GObject;
typedef struct _GObject GtkWidget;
typedef struct _GtkSourceView GtkSourceView;
typedef struct _GtkSourceBuffer GtkSourceBuffer;
typedef struct _GtkSourceLanguage GtkSourceLanguage;
typedef struct _GtkSourceCompletion GtkSourceCompletion;
typedef struct _GtkSourceStyleScheme GtkSourceStyleScheme;
typedef struct _GtkSourceUndoManager GtkSourceUndoManager;
typedef struct _GtkSourceLanguageManager GtkSourceLanguageManager;
typedef struct _GtkSourceCompletionProvider GtkSourceCompletionProvider;
typedef struct _GtkSourceCompletionContext GtkSourceCompletionContext;
typedef struct _GtkSourceCompletionInfo GtkSourceCompletionInfo;
typedef struct _GtkSourceCompletionItem GtkSourceCompletionItem;
typedef struct _GtkSourceCompletionProposal GtkSourceCompletionProposal;
typedef struct _GtkSourceEncoding GtkSourceEncoding;
typedef struct _GtkSourceFile GtkSourceFile;
typedef struct _GtkSourceFileLoader GtkSourceFileLoader;
typedef struct _GtkSourceFileSaver GtkSourceFileSaver;
typedef struct _GtkSourceGutter GtkSourceGutter;
typedef struct _GtkSourceGutterRenderer GtkSourceGutterRenderer;
typedef struct _GtkSourceGutterRendererPixbuf GtkSourceGutterRendererPixbuf;
typedef struct _GtkSourceGutterRendererText GtkSourceGutterRendererText;
typedef struct _GtkSourceLanguage GtkSourceLanguage;
typedef struct _GtkSourceLanguageManager GtkSourceLanguageManager;
typedef struct _GtkSourceMap GtkSourceMap;
typedef struct _GtkSourceMarkAttributes GtkSourceMarkAttributes;
typedef struct _GtkSourceMark GtkSourceMark;
typedef struct _GtkSourcePrintCompositor GtkSourcePrintCompositor;
typedef struct _GtkSourceSearchContext GtkSourceSearchContext;
typedef struct _GtkSourceSearchSettings GtkSourceSearchSettings;
typedef struct _GtkSourceSpaceDrawer GtkSourceSpaceDrawer;
typedef struct _GtkSourceStyle GtkSourceStyle;
typedef struct _GtkSourceStyleScheme GtkSourceStyleScheme;
typedef struct _GtkSourceStyleSchemeChooser GtkSourceStyleSchemeChooser;
typedef struct _GtkSourceStyleSchemeChooserButton GtkSourceStyleSchemeChooserButton;
typedef struct _GtkSourceStyleSchemeChooserWidget GtkSourceStyleSchemeChooserWidget;
typedef struct _GtkSourceStyleSchemeManager GtkSourceStyleSchemeManager;
typedef struct _GtkSourceUndoManager GtkSourceUndoManager;
typedef struct _GtkObject GtkSourceCompletionWords;

void gtk_source_init(void);
void gtk_source_finalize(void);
GType gtk_source_view_get_type(void);
GtkSourceBuffer *gtk_source_buffer_new(void);
GtkSourceBuffer *gtk_source_buffer_new_with_language(GtkSourceLanguage *language);

GtkWidget *gtk_source_view_new(void);
GtkWidget *gtk_source_view_new_with_buffer(GtkSourceBuffer *buffer);
void gtk_source_view_set_show_line_numbers(GtkWidget *view, gboolean show);
void gtk_source_view_set_show_right_margin(GtkWidget *view, gboolean show);
gboolean gtk_source_view_get_show_line_numbers(GtkWidget *view);
void gtk_source_view_set_right_margin_position(GtkWidget *view, int pos);
void gtk_source_view_set_highlight_current_line(GtkWidget *view, gboolean highlight);
void gtk_source_view_set_auto_indent(GtkWidget *view, gboolean enable);
void gtk_source_view_set_indent_on_tab(GtkWidget *view, gboolean enable);
void gtk_source_view_set_tab_width(GtkWidget *view, int width);
void gtk_source_view_set_indent_width(GtkWidget *view, int width);
void gtk_source_view_set_smart_backspace(GtkWidget *view, gboolean smart_backspace);

GtkSourceCompletion *gtk_source_view_get_completion(GtkWidget *view);
GtkSourceCompletionWords * gtk_source_completion_words_new(const gchar *name, const char *null);
void gtk_source_completion_words_register(GtkSourceCompletionWords *words, GtkSourceBuffer *buffer);
void gtk_source_completion_words_unregister(GtkSourceCompletionWords *words, GtkSourceBuffer *buffer);
gboolean gtk_source_completion_add_provider(GtkSourceCompletion *completion, GtkSourceCompletionProvider *provider, const char *error);
GtkSourceCompletionItem * gtk_source_completion_item_new(void);
void gtk_source_completion_item_set_label(GtkSourceCompletionItem *item, const gchar *label);
void gtk_source_completion_item_set_markup(GtkSourceCompletionItem *item, const gchar *markup);
void gtk_source_completion_item_set_text(GtkSourceCompletionItem *item, const gchar *text);
void gtk_source_completion_item_set_icon(GtkSourceCompletionItem *item,
        const char *icon);
void gtk_source_completion_item_set_icon_name(GtkSourceCompletionItem *item,
        const gchar *icon_name);
void gtk_source_completion_item_set_info(GtkSourceCompletionItem *item,
        const gchar *info);

GtkSourceLanguageManager *gtk_source_language_manager_new(void);
GtkSourceLanguageManager *gtk_source_language_manager_get_default(void);
const char * const * gtk_source_language_manager_get_language_ids(GtkSourceLanguageManager *lm);

GtkSourceLanguage *gtk_source_language_manager_get_language(GtkSourceLanguageManager *lm, const char *id);
GtkSourceLanguage *gtk_source_language_manager_guess_language(GtkSourceLanguageManager *lm, const char *filename, const char *content_type);
GtkSourceLanguage *gtk_source_buffer_get_language(GtkSourceBuffer *buffer);

GtkSourceStyleScheme *gtk_source_buffer_get_style_scheme(GtkSourceBuffer *buffer);
const char *gtk_source_language_get_id(GtkSourceLanguage *language);
const char *gtk_source_language_get_name(GtkSourceLanguage *language);
char ** gtk_source_language_get_mime_types(GtkSourceLanguage *language);
const char *gtk_source_language_get_style_name(GtkSourceLanguage *language, const char *style_id);
void gtk_source_buffer_set_language(GtkSourceBuffer *buffer, GtkSourceLanguage *language);
void gtk_source_buffer_set_style_scheme(GtkSourceBuffer *buffer, GtkSourceStyleScheme *scheme);
void gtk_source_buffer_set_highlight_syntax(GtkSourceBuffer *buffer, bool highlight);
bool gtk_source_buffer_get_highlight_syntax(GtkSourceBuffer *buffer);
void gtk_source_buffer_set_highlight_matching_brackets(GtkSourceBuffer *buffer, bool highlight);
bool gtk_source_buffer_get_highlight_matching_brackets(GtkSourceBuffer *buffer);
void gtk_source_buffer_undo(GtkSourceBuffer *buffer);
void gtk_source_buffer_redo(GtkSourceBuffer *buffer);
bool gtk_source_buffer_can_undo(GtkSourceBuffer *buffer);
bool gtk_source_buffer_can_redo(GtkSourceBuffer *buffer);
void gtk_source_buffer_begin_not_undoable_action(GtkSourceBuffer *buffer);
void gtk_source_buffer_end_not_undoable_action(GtkSourceBuffer *buffer);
int gtk_source_buffer_get_max_undo_levels(GtkSourceBuffer *buffer);
void gtk_source_buffer_set_max_undo_levels(GtkSourceBuffer *buffer, int max_undo_levels);


GtkSourceMarkAttributes * gtk_source_mark_attributes_new(void);
void gtk_source_mark_attributes_set_icon_name(GtkSourceMarkAttributes *attributes, const gchar *icon_name);
