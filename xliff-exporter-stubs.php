<?php

/**
 * @package Polylang-Pro
 */
/**
 * Class PLL_Content_Parsing_Rules_Block
 *
 * Holds the rules defining which part of a block should be "translated" (see below).
 * Translated may mean different actions, like exporting it into a translation file, or updating the database...
 */
class PLL_Translation_Parsing_Rules_Block
{
    /**
     * Holds the rules as Xpath expression to evaluate in the blocks content.
     * By default, holds rules for the WordPress core blocks.
     *
     * @var array $rules
     */
    private $rules = array(
        'core/paragraph' => array('translatable_parts' => array('//p')),
        'core/heading' => array('translatable_parts' => array('//*[self::h1 or self::h2 or self::h3 or self::h4 or self::h5 or self::h6]')),
        'core/buttons' => array('translatable_parts' => array()),
        'core/button' => array('translatable_parts' => array('//a')),
        'core/image' => array('translatable_parts' => array('//figure/figcaption', '//figure/img/@alt'), 'media_ids_attribute' => 'id'),
        'core/gallery' => array('translatable_parts' => array('//figure/figcaption', '//figure/img/@alt'), 'media_ids_attribute' => 'ids'),
        'core/media-text' => array('translatable_parts' => array('//figure/img/@alt'), 'media_ids_attribute' => 'mediaId'),
        'core/list' => array('translatable_parts' => array('//ul/li|//ol/li')),
        'core/quote' => array('translatable_parts' => array('//blockquote/p', '//blockquote/cite')),
        'core/audio' => array('translatable_parts' => array('//figure/figcaption'), 'media_ids_attribute' => 'id'),
        'core/video' => array('translatable_parts' => array('//figure/figcaption'), 'media_ids_attribute' => 'id'),
        'core/file' => array('translatable_parts' => array('//div/a'), 'media_ids_attribute' => 'id'),
        'core/cover' => array('translatable_parts' => array('//div/p'), 'media_ids_attribute' => 'id'),
        // Since WP 5.0.0 core/cover-image is replaced with core/cover.
        'core/cover-image' => array('translatable_parts' => array('//div/p'), 'media_ids_attribute' => 'id'),
        'core/subhead' => array('translatable_parts' => array('//p')),
        'core/verse' => array('translatable_parts' => array('//pre')),
        'core/table' => array('translatable_parts' => array('//th', '//td', '//figure/figcaption')),
        'core/preformatted' => array('translatable_parts' => array('//pre')),
        'core/pullquote' => array('translatable_parts' => array('//blockquote/p', '//blockquote/cite')),
        'core/code' => array('translatable_parts' => array()),
        'core/more' => array('translatable_parts' => array()),
        'core/nextpage' => array('translatable_parts' => array()),
        'core/separator' => array('translatable_parts' => array()),
        'core/spacer' => array('translatable_parts' => array()),
        'core/shortcode' => array('translatable_parts' => array()),
        'core/group' => array('translatable_parts' => array()),
        'core/columns' => array('translatable_parts' => array()),
        'core/column' => array('translatable_parts' => array()),
        'core/social-links' => array('translatable_parts' => array()),
        'core/text-columns' => array('translatable_parts' => array('//div[@class="wp-block-column"]')),
        'core/embed' => array('translatable_parts' => array('//figure/figcaption')),
        'core-embed/twitter' => array('translatable_parts' => array('//figure/figcaption')),
        'core-embed/youtube' => array('translatable_parts' => array('//figure/figcaption')),
        'core-embed/facebook' => array('translatable_parts' => array('//figure/figcaption')),
        'core-embed/instagram' => array('translatable_parts' => array('//figure/figcaption')),
        'core-embed/vimeo' => array('translatable_parts' => array('//figure/figcaption')),
        'core-embed/soundcloud' => array('translatable_parts' => array('//figure/figcaption')),
        'core-embed/spotify' => array('translatable_parts' => array('//figure/figcaption')),
        'core-embed/flickr' => array('translatable_parts' => array('//figure/figcaption')),
        'core-embed/animoto' => array('translatable_parts' => array('//figure/figcaption')),
        'core-embed/collegehumor' => array('translatable_parts' => array('//figure/figcaption')),
        'core-embed/dailymotion' => array('translatable_parts' => array('//figure/figcaption')),
        'core-embed/funnyordie' => array('translatable_parts' => array('//figure/figcaption')),
        'core-embed/hulu' => array('translatable_parts' => array('//figure/figcaption')),
        'core-embed/imgur' => array('translatable_parts' => array('//figure/figcaption')),
        'core-embed/issuu' => array('translatable_parts' => array('//figure/figcaption')),
        'core-embed/kickstarter' => array('translatable_parts' => array('//figure/figcaption')),
        'core-embed/meetup-com' => array('translatable_parts' => array('//figure/figcaption')),
        'core-embed/mixcloud' => array('translatable_parts' => array('//figure/figcaption')),
        'core-embed/photobucket' => array('translatable_parts' => array('//figure/figcaption')),
        'core-embed/photobucket' => array('translatable_parts' => array('//figure/figcaption')),
        'core-embed/polldaddy' => array('translatable_parts' => array('//figure/figcaption')),
        'core-embed/reddit' => array('translatable_parts' => array('//figure/figcaption')),
        'core-embed/reverbnation' => array('translatable_parts' => array('//figure/figcaption')),
        'core-embed/screencast' => array('translatable_parts' => array('//figure/figcaption')),
        'core-embed/scribd' => array('translatable_parts' => array('//figure/figcaption')),
        'core-embed/slideshare' => array('translatable_parts' => array('//figure/figcaption')),
        'core-embed/smugmug' => array('translatable_parts' => array('//figure/figcaption')),
        'core-embed/speaker' => array('translatable_parts' => array('//figure/figcaption')),
        'core-embed/ted' => array('translatable_parts' => array('//figure/figcaption')),
        'core-embed/tumblr' => array('translatable_parts' => array('//figure/figcaption')),
        'core-embed/videopress' => array('translatable_parts' => array('//figure/figcaption')),
        'core-embed/wordpress' => array('translatable_parts' => array('//figure/figcaption')),
        'core-embed/wordpress-tv' => array('translatable_parts' => array('//figure/figcaption')),
        'core/html' => array('translatable_parts' => array(), 'html' => \true),
    );
    /**
     * Holds the name of the block type being currently parsed.
     *
     * @var string $block_type Similar to {@see WP_Block_Parser_Block::$blockName}.
     */
    private $block_type;
    /**
     * Check if this block type is a media block type.
     *
     * @since 2.9
     *
     * @param string $block An array mimicking {@see WP_Block_Parser_Block}.
     *
     * @return bool True if an entry is a media block type, false otherwise.
     */
    public function is_media_block_type($block)
    {
    }
    /**
     * Only keeps the rules matching a certain block type.
     *
     * @since 2.9
     *
     * @param string $block_type {@see WP_Block_Parser_Block::$blockName}.
     * @return PLL_Translation_Parsing_Rules_Block $this This object with its $rules property updated.
     */
    public function filter($block_type)
    {
    }
    /**
     * Extracts translatable parts from the block content.
     * Returns the exact same block content if if the parsing rule is set to false.
     *
     * @since 2.9
     *
     * @uses DOMXPath
     * @param string $content {@see WP_Block_Parser_Block::$innerContent}.
     * @return string[]
     */
    public function parse($content)
    {
    }
    /**
     * Check whether a block contains freeform html.
     *
     * This is made to check blocks known by Polylang only.
     *
     * @since 2.9
     *
     * @param array $block An array mimicking a {@see WP_Block_Parser_Block}.
     * @return bool
     */
    private function is_html_block_type($block)
    {
    }
    /**
     * Retrieves the ids of the medias contained in a block.
     *
     * @since 2.9
     *
     * @param array $block An array mimicking a {@see WP_Block_Parser_Block}.
     * @return mixed
     */
    public function get_media_ids($block)
    {
    }
    /**
     * Define if a block should be parsed as custom HTML.
     *
     * @since 2.9
     *
     * @param array $block An array mimicking a {@see WP_Block_Parser_Block}.
     * @return bool
     */
    public function should_parse_as_html($block)
    {
    }
}
/**
 * @package Polylang-Pro
 */
/**
 * Class PLL_Translation_Walker_Base
 *
 * Define interface for classes that iterate over content. Also serve as a factory for those classes.
 */
abstract class PLL_Translation_Walker_Base
{
    /**
     * Generates the correct subclass for the content to be walked.
     *
     * Copies condition from {@see has_blocks()} because we don't need to hit the database to get a content we already has.
     *
     * @since 2.8
     *
     * @param string $content A content to iterate over.
     * @return PLL_Translation_Walker_Base
     */
    public static function create_from($content)
    {
    }
    /**
     * Iterates over each translatable part of a content and applies a callback function on each part.
     *
     * @since 2.8
     *
     * @param callable $callback A callback function.
     * @return string The content (eventually) modified by the callback.
     */
    public abstract function walk($callback);
}
/**
 * @package Polylang-Pro
 */
/**
 * Class PLL_Translation_Walker_Classic
 *
 * Iterates over a HTML formatted string and applies transformations on level 1 HTML tags.
 */
class PLL_Translation_Walker_Classic extends \PLL_Translation_Walker_Base
{
    /**
     * Original content.
     *
     * @var string
     */
    private $content;
    /**
     * Original content parsed as a DOM tree.
     *
     * @var PLL_DOM_Document
     */
    private $document;
    /**
     * Callback to execute on each translatable content part.
     *
     * @var callable
     */
    private $callback;
    /**
     * PLL_Content_Walker_Classic constructor.
     *
     * @param string $content Classic editor HTML content.
     */
    public function __construct($content)
    {
    }
    /**
     * Iterate over translatable parts of a content, applies the defined callback on each such part, and then returns a transformed content.
     *
     * @param callable $callback A transformation to apply to each translatable content part.
     * @return string
     */
    public function walk($callback)
    {
    }
    /**
     * Parse a HTML document node and apply a callback onto translatable values.
     *
     * @since 2.9
     * @param DOMNode $node A first level HTML node.
     *
     * @return string The content after having applied the callback onto it.
     */
    private function apply($node)
    {
    }
    /**
     * Generate a string of all atributes to be inserted as an attributes list in a HTML tag.
     *
     * @param DOMElement                       $node  The current node.
     * @param PLL_Translation_Entry_Identified $entry A translation entry parsed from a translation document.
     *
     * @return string
     */
    protected function make_html_tag_attributes($node, $entry)
    {
    }
    /**
     * Handles nodes containing images for compose the returned content.
     *
     * @param DOMElement $node Node containing images.
     *
     * @return mixed|string
     */
    private function handle_image($node)
    {
    }
    /**
     * Get all the media ids that are contained in the posts.
     *
     * @return array
     */
    public function get_contained_medias_ids()
    {
    }
    /**
     * Creates a HTML tag from a Translation_Entry and a PHP DOMNode.
     *
     * @param DOMNode                          $node A DOM node parsed from a HTML formatted database content.
     * @param PLL_Translation_Entry_Identified $entry A translation entry parsed from a translation document.
     * @return string A HTML formatted string.
     */
    private function make_html_tag_from($node, $entry)
    {
    }
}
/**
 * @package Polylang-Pro
 */
/**
 * Manages translating post from the database
 *
 * @since 2.9
 */
class PLL_Translation_Post_Model extends \PLL_Sync_Post_Model
{
    /**
     * The posts fields.
     *
     * @var array
     */
    private $fields;
    /**
     * PLL_Translation_Post_Model constructor.
     *
     * @since 2.8
     *
     * @param mixed $polylang Used to retrieve the dependencies.
     */
    public function __construct($polylang)
    {
    }
    /**
     * Translates a post in a given language.
     *
     * @since 2.8
     *
     * @param array        $entry {@see PLL_Xliff_Export::get_next_entry()} output.
     * @param PLL_Language $language A language to translate into.
     */
    public function translate_post($entry, $language)
    {
    }
    /**
     * Replaces the fields in the translation post with the supplied values.
     *
     * @param WP_Post      $post The source post.
     * @param PLL_Language $lang The language to translate into.
     */
    protected function set_translation_post($post, $lang)
    {
    }
    /**
     * Returns values for the post fields to update.
     */
    protected function get_columns_to_copy_in_db()
    {
    }
}
/**
 * @package Polylang-Pro
 */
/**
 * Class PLL_Content_Walker_Blocks
 *
 * Walk a block composed content to apply a translation callback on every translatable parts.
 */
class PLL_Translation_Walker_Blocks extends \PLL_Translation_Walker_Base
{
    /**
     * Content to be iterated upon.
     *
     * @var string
     */
    private $content;
    /**
     * Holds the blocks parsed by the WP_Block_Parser.
     *
     * @var array
     */
    private $blocks;
    /**
     * A reference to the block parsing rules.
     *
     * @var PLL_Translation_Parsing_Rules_Block
     */
    private $parsing_rules;
    /**
     * Holds the callback to be applied on each block, including the nested blocks.
     *
     * @var callable
     */
    private $callback;
    /**
     * PLL_Content_Walker_Blocks constructor.
     *
     * @param string $content An original (post?) content.
     */
    public function __construct($content)
    {
    }
    /**
     * Walk through the blocks and nested blocks to apply a callback on every one of them.
     *
     * @param callable $callback A callable to be applied on each block.
     *
     * @return string The walked content, eventually transformed by the callback.
     */
    public function walk($callback)
    {
    }
    /**
     * Recursively apply the callback provided to the {@see PLL_Translation_Walker_Blocks::walk()} method on a block.
     * Search for translatable strings matching rules defined by {@see PLL_Translation_Rules_Block} and passes those to the callback function.
     * Delegates to {@see PLL_Translation_Walker_Classic} when not parsing rule match the current block being parsed.
     *
     * @param array $block An associative array mimicking a WP_Block_Parser_Block object.
     *
     * @return array An array mimicking a WP_Block_Parser_Block object.
     */
    private function apply($block)
    {
    }
    /**
     * @param array  $block An array mimicking a WP_Block_Parser_Block {@link https://github.com/WordPress/wordpress-develop/blob/98bee9bf081e2c43c8908002d75870c3dfd61b19/src/wp-includes/class-wp-block-parser.php#L15}
     * @param int    $i Numeric index of the inner block content to replace.
     * @param string $source_string String or sub-string to replace in the inner block content.
     * @param string $translated_string String or sub-string replacement in the inner block content.
     *
     * @return array An array mimicking a WP_Block_Parser_Block
     */
    private function replace_in_block_inner_content($block, $i, $source_string, $translated_string)
    {
    }
    /**
     * Get all the media ids that are contained in the posts.
     *
     * @return array
     */
    public function get_contained_medias_ids()
    {
    }
}
/**
 * @package Polylang-Pro
 */
/**
 * Class PLL_Translations_Identified
 *
 * Decorates a Translations object, and allow to add and translate entries given a unique ID.
 */
class PLL_Translation_Translations_Identified
{
    /**
     * Reference to a Translations instance, holding Translations entries.
     *
     * @var Translations $translations
     */
    private $translations;
    /**
     * PLL_Import_Translations_Identified constructor.
     *
     * @param Translations|PLL_Translation_Translations_Interface $translations a Translations instance to decorate. If null, a new {@see Translations} will be generated instead.
     */
    public function __construct($translations = \null)
    {
    }
    /**
     * Delegates method calls to the inner Translations instance.
     *
     * @param string $name Name of the called method.
     * @param array  $args Arguments to pass to the called method.
     * @return mixed
     */
    public function __call($name, $args)
    {
    }
    /**
     * Triggers identification then add entry to its decorated Translations instance.
     *
     * @see PLL_Translation_Translations_Identified::maybe_identify_and_process()
     *
     * @param array|Translation_Entry $entry The translation entry to add. May have an id defined, but it is not mandatory.
     * @return array|PLL_Translation_Entry_Identified
     */
    public function add_entry($entry)
    {
    }
    /**
     * Triggers identification then delegates to its decorated Translations instance what to do with this entry.
     *
     * @see PLL_Translation_Translations_Identified::maybe_identify_and_process()
     *
     * @param array|Translation_Entry $entry The translation entry to add or merge. May have an id defined, but it is not mandatory.
     * @return array|PLL_Translation_Entry_Identified
     */
    public function add_entry_or_merge($entry)
    {
    }
    /**
     * Allow to access the decorated Translations properties.
     *
     * @param string $name Name of the property to access.
     *
     * @return mixed
     */
    public function __get($name)
    {
    }
    /**
     * Sets the identifier for an entry.
     *
     * @param array|Translation_Entry $entry An entry to set an identifier to, or an array to create such entry.
     * @param callable                $callback A function to process on every callback.
     *
     * @return bool|PLL_Translation_Entry_Identified
     */
    private function maybe_identify_and_process($entry, $callback)
    {
    }
    /**
     * Define the id number to give to the next entry that needs one.
     *
     * @since 2.9
     * @return int
     */
    private function next_entry_id()
    {
    }
    /**
     * Getter
     *
     * @return PLL_Translation_Translations_Interface|Translations|null The decorated Translations instance.
     */
    public function get_translation()
    {
    }
}
/**
 * @package Polylang-Pro
 */
/**
 * Class PLL_Translation_Entry_Identified
 *
 * Use Decorator Pattern around a Translation_Entry to change the way it is identified, by giving an 'id' property.
 */
class PLL_Translation_Entry_Identified
{
    /**
     * Uniquely identifies the translation, whether its string has changed or not.
     *
     * @var int|string $id
     */
    private $id;
    /**
     * A translation entry to decorate
     *
     * @var Translation_Entry $entry
     */
    public $entry;
    /**
     * PLL_Translation_Entry_Identified.
     *
     * @param Translation_Entry|array $entry A translation entry to decorate, or an array mimicking a Translation_Entry object. Default: empty array.
     */
    public function __construct($entry = array())
    {
    }
    /**
     * Verify if this property is set in the decorated instance.
     *
     * @param string $name Name of the decorated instance's property to verify.
     *
     * @return bool
     */
    public function __isset($name)
    {
    }
    /**
     * Allow to access the decorated entry properties.
     *
     * @param string $name Name of the decorated instance's property to access.
     *
     * @return mixed
     */
    public function __get($name)
    {
    }
    /**
     * Delegates call to the decorated entry.
     *
     * @param string $name Name of the method to call.
     * @param array  $args Arguments to pass to the decorated method.
     *
     * @return mixed
     */
    public function __call($name, $args = array())
    {
    }
    /**
     * Returns a unique string to identify this entry.
     *
     * @return string
     */
    public function key()
    {
    }
    /**
     * Setter
     *
     * @param string|int $id A unique identifier to retrieve this entry.
     */
    public function set_id($id)
    {
    }
    /**
     * Getter
     *
     * @return int
     */
    public function get_id()
    {
    }
}
/**
 * @package polylang-pro
 */
/**
 * Translate post taxonomies from a set of translation entries.
 */
class PLL_Translation_Term
{
    /**
     * Translations set where to look for the post metas translations.
     *
     * @var Translations|PLL_Translation_Translations_Interface
     */
    private $translations;
    /**
     * Used to manage languages and translations.
     *
     * @var PLL_Model
     */
    private $model;
    /**
     * PLL_Translation_Term constructor.
     *
     * @param PLL_Model $model PLL model.
     */
    public function __construct($model)
    {
    }
    /**
     * Setter for translations set
     *
     * @param  Translations|PLL_Translation_Translations_Interface $translations A set of translations to search the metas translations in.
     */
    public function set_translations($translations)
    {
    }
    /**
     * Translate a term.
     *
     * @param array        $entry Array of an entry properties.
     * @param PLL_Language $language The target language.
     * @return void
     */
    public function translate_term($entry, $language)
    {
    }
    /**
     * Get the translated term name if exists, the source name otherwise.
     *
     * @param WP_Term $source_term The source term object.
     * @return string The translated name.
     */
    private function get_translated_term_name($source_term)
    {
    }
    /**
     * Get the translated term description if exists, the source description otherwise.
     *
     * @param WP_Term $source_term The source term object.
     * @return string The translated description.
     */
    private function get_translated_term_description($source_term)
    {
    }
    /**
     * Translate a given entry, return the source string if no translation found.
     *
     * @param PLL_Translation_Entry_Identified $entry The entry to translate.
     * @return string The translated string from the entry.
     */
    private function maybe_translate_term_entry($entry)
    {
    }
}
/**
 * @package Polylang-Pro
 */
/**
 * Interface PLL_Translation_Interface
 *
 * Defines the minimal set of functionality for a Translations holder.
 * Based on WordPress {@see Translations} object.
 */
interface PLL_Translation_Translations_Interface
{
    /**
     * Add a translation entry.
     * If a translation entry with the same key already exists, it is replaced by the new translation entry.
     *
     * @param array|Translation_Entry $entry If array, its keys should match Translation_Entry properties names.
     * @return bool False if translation entry key is invalid, true otherwise.
     */
    public function add_entry($entry);
    /**
     * Add a new translation entry if its key doesn't already exists.
     * Otherwise, merge the new translation entry with a translation entry that has the same key.
     *
     * @param array|Translation_Entry $entry If array, its keys should match Translation_Entry properties names.
     * @return bool False if translation entry key is invalid, true otherwise.
     */
    public function add_entry_or_merge($entry);
    /**
     * Retrieve translation for a specific entry.
     *
     * @param Translation_Entry $entry A translation entry to translate.
     * @return bool|Translation_Entry false if the translation entry doesn't match an exisiting translation entry
     */
    public function translate_entry($entry);
    /**
     * Translate a string given its context.
     *
     * @param string      $singular The string to translate.
     * @param null|string $context The context to help identify the string. Default: null.
     * @return string The translated string if a translation entry matches the original, the original string otherwise.
     */
    public function translate($singular, $context);
    /**
     * Add the entries from the $other translations holder.
     * Replace this instance's entries with entries from  he $other translations holder if the keys match.
     *
     * @param PLL_Translation_Translations_Interface $other An instance to merge in this one.
     * @return void
     */
    public function merge_with($other);
    /**
     * Add new translation entries from another translations holder.
     * Do not add the translation entries that match existing keys.
     *
     * @param PLL_Translation_Translations_Interface $other An instance to merge this one in.
     * @return void
     */
    public function merge_originals_with($other);
}
/**
 * @package Polylang-Pro
 */
/**
 * Class PLL_Translation_Translations_Filtered
 *
 * Decorates a translations container to only work with entries from a certain context.
 * Automatically guess this context when consumer does not provide it.
 */
class PLL_Translation_Translations_Filtered implements \PLL_Translation_Translations_Interface
{
    /**
     * Holds a translations container instance to decorate.
     *
     * @var Translations|PLL_Translation_Translations_Interface
     */
    private $translations;
    /**
     * The context which every entry relate to.
     *
     * @var string
     */
    private $context;
    /**
     * PLL_Translation_Translations_Filtered constructor.
     *
     * The decorated translations container will be stripped of all its entries not matching the selected context.
     *
     * @param string $context The context to which every entry should be related.
     * @param null   $translations Optional. A translations container. Will be filtered.
     */
    public function __construct($context, $translations = \null)
    {
    }
    /**
     * Access the properties of the decorated instance.
     *
     * @param string $name The accessed property's name.
     * @return mixed
     * @throws Exception If the property name does not match an existing property of the decorated instance.
     */
    public function __get($name)
    {
    }
    /**
     * Strip every entry that doesn't belongs to the expected context from the translations container.
     *
     * @param Translations|PLL_Translation_Translations_Interface $translations A translations container to be filtered.
     * @return mixed The same class than the instance passed as argument.
     */
    private function filter_translations($translations)
    {
    }
    /**
     * Add the selected context to the entry if it has none. Discard it if it has another context.
     *
     * @param Translation_Entry $entry An entry to verify.
     * @return array|bool False if the entry's context doesn't match the expected one.
     */
    private function filter_entry($entry)
    {
    }
    /**
     * Add a translation entry.
     * If a translation entry with the same key already exists, it is replaced by the new translation entry.
     *
     * @param array|Translation_Entry $entry If array, its keys should match Translation_Entry properties names.
     * @return bool False if translation entry key is invalid, true otherwise.
     */
    public function add_entry($entry)
    {
    }
    /**
     * Add a new translation entry if its key doesn't already exists.
     * Otherwise, merge the new translation entry with a translation entry that has the same key.
     *
     * @param array|Translation_Entry $entry If array, its keys should match Translation_Entry properties names.
     * @return bool False if translation entry key is invalid, true otherwise.
     */
    public function add_entry_or_merge($entry)
    {
    }
    /**
     * Retrieve translation for a specific entry.
     *
     * @param Translation_Entry $entry A translation entry to translate.
     * @return bool|Translation_Entry false if the translation entry doesn't match an exisiting translation entry
     */
    public function translate_entry($entry)
    {
    }
    /**
     * Translate a string given its context.
     *
     * @param string      $singular The string to translate.
     * @param null|string $context The context to help identify the string. Default: null.
     * @return string The translated string if a translation entry matches the original, the original string otherwise.
     */
    public function translate($singular, $context = \null)
    {
    }
    /**
     * Add the entries from the $other translations holder.
     * Replace this instance's entries with entries from  he $other translations holder if the keys match.
     *
     * @param PLL_Translation_Interface $other An instance to merge in this one.
     * @return void
     */
    public function merge_with($other)
    {
    }
    /**
     * Add new translation entries from another translations holder.
     * Do not add the translation entries that match existing keys.
     *
     * @param PLL_Translation_Interface $other An instance to merge this one in.
     * @return void
     */
    public function merge_originals_with($other)
    {
    }
}
/**
 * @package polylang-pro
 */
/**
 * @package polylang-pro
 */

/**
 * Class PLL_Translation_Post_Metas
 *
 * Translate post metas from a set of translation entries.
 */
class PLL_Translation_Post_Metas {

	/**
	 * Translations set where to look for the post metas translations.
	 *
	 * @var Translations|PLL_Translation_Translations_Interface
	 */
	private $translations;

	/**
	 * Meta key for attachment metadatas.
	 *
	 * @var string
	 */
	const ATTACHMENT_METADATA = '_wp_attachment_metadata';

	/**
	 * Meta key for the attached files.
	 *
	 * @var string
	 */
	const ATTACHED_FILE = '_wp_attached_file';

	/**
	 * Meta key for image alternative texts.
	 *
	 * @var string
	 */
	const ATTACHMENT_IMAGE_ALT = '_wp_attachment_image_alt';

	/**
	 * Metas that are untranslatable.
	 *
	 * @var array
	 */
	private $untranslatable_metas = array(
		self::ATTACHMENT_METADATA,
		self::ATTACHED_FILE,
	);

	/**
	 * Metas that should remain unique.
	 *
	 * @var array
	 */
	private $unique_metas = array(
		self::ATTACHMENT_METADATA,
		self::ATTACHED_FILE,
		self::ATTACHMENT_IMAGE_ALT,
	);

	/**
	 * Initialize the class by creating the needed hooks.
	 */
	public function init()
	{
	}

	/**
	 * Setter for translations set
	 *
	 * @param  Translations|PLL_Translation_Translations_Interface $translations A set of translations to search the metas translations in.
	 */
	public function set_translations( $translations )
	{
	}

	/**
	 * Look for translation of a meta value.
	 *
	 * @param mixed  $value A value to translate. Can only be translated if it is an unserialized string.
	 * @param string $key Key of the meta to translate.
	 * @return mixed
	 */
	public function maybe_translate_value( $value, $key )
	{
	}

	/**
	 * Hack to prevent duplicating post metas.
	 *
	 * TODO : Spot what causes the duplicated metas and get rid of this filter
	 *
	 * @param bool   $check      To allow adding meta, unused.
	 * @param int    $object_id  The ID of the object.
	 * @param string $meta_key   The added meta key.
	 * @return bool
	 */
	public function add_meta( $check, $object_id, $meta_key )
	{
	}
}
/**
 * Class PLL_Translation_Content
 *
 * @package polylang-pro
 */
/**
 * Class PLL_Translation_Content
 *
 * Replace content transformation from PLL_Sync_Content to translate instead of copy such content.
 *
 * @since 2.8
 */
class PLL_Translation_Content extends \PLL_Transform_Content
{
    /**
     * The translations used to transform the content.
     *
     * @since 2.8
     *
     * @var Translations|PLL_Translation_Translations_Interface
     */
    private $translations;
    /**
     * Setter
     *
     * @since 2.8
     *
     * @param Translations|PLL_Translation_Translations_Interface $translations Used to translate the content.
     */
    public function set_translations($translations)
    {
    }
    /**
     * Translates the original's post title.
     *
     * @since 2.8
     *
     * @param string $from_post post_content field of the original WP_Post.
     * @return string
     */
    public function translate_title($from_post)
    {
    }
    /**
     * Uses a {@see PLL_Translation_Walker_Base} subclass to iterate over each translatable part of the passed content, and applies a transformation callback to it. Then returns the transformed content.
     *
     * @since 2.8
     *
     * @param string $content post_content field of the original WP_Post.
	 * @param bool $is_media_content Whether or not the given content comes from a media.
     * @return string
     */
    public function translate_content($content, $is_media_content = false)
    {
    }
    /**
     * Translates the original post's excerpt.
     *
     * @since 2.8
     *
     * @param string $post_excerpt post_excerpt field of the original WP_Post.
     * @return string
     */
    public function translate_excerpt($post_excerpt)
    {
    }
}
/**
 * @package Polylang-Pro
 */
/**
 * Define the structure for a file downloader
 *
 * @since 2.9
 */
interface PLL_Export_Downloader_Interface
{
    /**
     * Create a new file to download
     *
     * @since 2.7
     *
     * @param PLL_Export_File_Interface $export Name of the class to be isntantiated.
     */
    public function create($export);
    /**
     * Send correct response headers and outputs downloadable file
     *
     * @since 2.7
     */
    public function send_response();
}
/**
 * Export actions class file
 *
 * @package exportActions
 */
/**
 * A class that handles export actions
 *
 * @file
 *
 * @since 2.7
 */
class PLL_Export_Bulk_Option extends \PLL_Bulk_Translate_Option
{
    /**
     * Represent export file.
     *
     * @var $export PLL_Export_File_Interface
     */
    private $export;
    /**
     * A class to handle file download
     *
     * @var $downloader PLL_Export_Download_Zip
     */
    private $downloader;
    /**
     * Post taxonomies
     *
     * @var array $post_taxonomies
     */
    private $post_taxonomies;
    /**
     * Post metas
     *
     * @var array $post_metas.
     */
    private $post_metas;
    /**
     * Term Metas
     *
     * @var $term_metas PLL_Export_Term_Metas
     */
    private $term_metas;
    /**
     * PLL_Export_Bulk_Option constructor.
     *
     * @param PLL_Model                              $model Used to query languages and post translations.
     * @param PLL_Export_File|PLL_Export_Multi_Files $export A file writer class.
     * @param PLL_Export_Download_Zip                $downloader A file to handle downloading files.
     */
    public function __construct($model, $export, $downloader)
    {
    }
    /**
     * Defines wether the export Bulk Translate option is available given the admin panel and user logged.
     *
     * @since 2.7
     *
     * @return bool
     */
    public function is_available()
    {
    }
    /**
     *
     * Export post content for converter
     *
     * @param array $posts_id Array of post ids.
     * @param array $target_languages Array of target languages.
     *
     * @throws Exception Exception.
     */
    public function do_bulk_action($posts_id, $target_languages)
    {
    }
    /**
     * Get post data from id
     *
     * @param int    $post_id Post id.
     * @param string $target_language Targeted languages.
     *
     * @throws Exception Exception.
     */
    public function translate($post_id, $target_language)
    {
    }
    /**
     * Updates a post.
     *
     * @param array $post Post values to update (must contain an ID (int)).
     */
    public function update_post_with_translations_ids($post)
    {
    }
    /**
     * Prevent our translations ids to be sanitized.
     *
     * @param array $allowedhtml With tag names as keys, and an array of allowed attributes as value.
     * @return array
     */
    public function allow_pll_id_in_attributes($allowedhtml)
    {
    }
    /**
     *
     * Handle the export of the post metas
     *
     * @param int        $post_id Post Id.
     * @param int|string $translation_post_id Post Id translation.
     *
     * @throws Exception Exception.
     */
    public function post_meta_export_handling($post_id, $translation_post_id = '')
    {
    }
    /**
     *
     * Handle the export of post taxonomies.
     *
     * @param array  $posts_id Posts Id.
     * @param string $target_language Language.
     *
     * @throws Exception Exception.
     */
    public function post_taxonomy_export_handling($posts_id, $target_language)
    {
    }
    /**
     * Get all the media ids that are contained in the posts.
     *
     * @param array $post_ids Post ids.
     *
     * @return array
     */
    protected function get_all_media_ids_contained_in_posts($post_ids)
    {
    }
    /**
     * Handle the export of term metas.
     *
     * @param array $term_metas Term metas.
     */
    public function term_metas_export_handling($term_metas)
    {
    }
    /**
     *
     * Sort posts id to not export several of the same translation
     *
     * @param array $posts_id Array of post ID.
     * @param array $target_languages Languages slug.
     *
     * @return array $posts_id Array of posts ID.
     */
    public function get_sorted_post_translations($posts_id, $target_languages)
    {
    }
}
/**
 * @package Polylang-Pro
 */
/**
 * Class PLL_Export_Post_Meta
 *
 * @since 2.9
 */
class PLL_Export_Post_Metas
{
    /**
     *
     * Get the custom fields to export
     *
     * @param int        $from Id of the post from which the meta comes from.
     * @param int|string $translation_post_id Post Id translation.
     *
     * @return array
     */
    public function get_metas_to_export($from, $translation_post_id)
    {
    }
    /**
     *
     * Export metas translations
     *
     * @param int        $from Post id.
     * @param int|string $translation_post_id Post Id translation.
     *
     * @return array
     */
    public function export_metas_and_translations($from, $translation_post_id = '')
    {
    }
}
/**
 * @package Polylang-Pro
 */
/**
 *
 * Class that send the taxonomies that will be exported.
 *
 * Class PLL_Export_Post_Taxonomies
 */
class PLL_Export_Post_Taxonomies
{
    /**
     * Used to query languages and translations.
     *
     * @var PLL_Model
     */
    private $model;
    /**
     * Term Metas
     *
     * @var $term_metas PLL_Export_Term_Metas
     */
    private $term_metas;
    /**
     * PLL_Export_Post_Taxonomies constructor.
     *
     * @param PLL_Model $model Needed to access the translated taxonomies list.
     */
    public function __construct($model)
    {
    }
    /**
     *
     * Get the taxonomies that need to be exported.
     *
     * @param int|string $from Post Id.
     *
     * @return array
     */
    protected function get_taxonomies_to_export($from = '')
    {
    }
    /**
     *
     * Get taxonomies to export
     *
     * @param array  $from Posts id.
     * @param string $target_language Language of the translated post.
     *
     * @return mixed|void
     */
    public function export_taxonomies_and_translations($from, $target_language)
    {
    }
}
/**
 * @package Polylang-Pro
 */
/**
 * Class PLL_Export_Term_Metas
 *
 * @since 2.7
 */
class PLL_Export_Term_Metas
{
    /**
     * Get the custom fields to export
     *
     * @return array
     */
    protected function get_term_metas_to_export()
    {
    }
    /**
     * Export metas translations
     *
     * @param int    $from Term id.
     * @param string $tr_id Term id Translation.
     *
     * @return array
     */
    public function export_term_metas($from, $tr_id = '')
    {
    }
}
/**
 * @package Polylang-Pro
 */
/**
 * Class PLL_Import_XLIFF_Iterator
 */
class PLL_Import_XLIFF_Iterator implements \RecursiveIterator
{
    /**
     * The node.
     *
     * @var $nodes DOMNodeList.
     */
    private $nodes;
    /**
     * The offset.
     *
     * @var $offset int.
     */
    private $offset;
    /**
     * PLL_Import_XLIFF_Iterator constructor.
     *
     * @param DOMNodeList $nodes Nodes.
     */
    public function __construct(\DOMNodeList $nodes)
    {
    }
    /**
     * Replace the cursor at position 0.
     *
     * @return int|void offset.
     */
    public function rewind()
    {
    }
    /**
     * Get the current element.
     *
     * @return DOMNode|mixed|null
     */
    public function current()
    {
    }
    /**
     * Get the key.
     *
     * @return mixed|string
     */
    public function key()
    {
    }
    /**
     * Place the cursor to the next element.
     *
     * @return int|void
     */
    public function next()
    {
    }
    /**
     * Check the node validity.
     *
     * @return bool
     */
    public function valid()
    {
    }
    /**
     * Check if the node has children.
     *
     * @return bool
     */
    public function hasChildren()
    {
    }
    /**
     * Get the node's children
     *
     * @return RecursiveIterator
     */
    public function getChildren()
    {
    }
}
