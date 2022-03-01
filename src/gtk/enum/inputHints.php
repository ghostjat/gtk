<?php

namespace gtk\enum;

/**
 * Description of inputHints
 * Describes hints that might be taken into account by input methods or applications. 
 * Note that input methods may already tailor their behaviour according to the GtkInputPurpose of the entry.
 * @author ghost
 */
class inputHints {

    public const NONE = -1,
            SPELLCHECK = 1,
            NO_SPELLCHECK = 2,
            WORD_COMPLETION = 3,
            LOWERCASE = 4,
            UPPERCASE_CHARS = 5,
            UPPERCASE_WORDS = 6,
            UPPERCASE_SENTENCES = 7,
            INHIBIT_OSK = 8,
            VERTICAL_WRITING = 9,
            EMOJI = 10,
            NO_EMOJI = 11;

}
