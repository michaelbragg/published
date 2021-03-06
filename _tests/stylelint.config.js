"use strict"

module.exports = {
    "plugins": [
    "stylelint-scss",
    "stylelint-no-unsupported-browser-features"
    ],
    "ignoreFiles": "",
    "rules": {
        "color-hex-case": "lower",
        "color-hex-length": "long",
        "color-named": "never",
        "color-no-invalid-hex": true,
        "font-family-name-quotes": "always-where-recommended",
        "font-family-no-duplicate-names": true,
        "font-weight-notation": "numeric",
        "function-calc-no-unspaced-operator": true,
        "function-comma-newline-after": "never-multi-line",
        "function-comma-newline-before": "never-multi-line",
        "function-comma-space-after": "always-single-line",
        "function-comma-space-before": "never",
        "function-linear-gradient-no-nonstandard-direction": true,
        "function-max-empty-lines": 0,
        "function-name-case": "lower",
        "function-parentheses-newline-inside": "always-multi-line",
        "function-parentheses-space-inside": "never",
        "function-url-scheme-blacklist": [
          "ftp",
          "/^http/",
          "data"
        ],
        "function-url-no-scheme-relative": true,
        "function-url-quotes": "always",
        "function-whitespace-after": "always",
        "number-leading-zero": "always",
        "number-max-precision": [4,{"severity": "warning"}],
        "number-no-trailing-zeros": true,
        "string-no-newline": true,
        "string-quotes": "single",
        "length-zero-no-unit": true,
        "time-min-milliseconds": 100,
        "unit-blacklist": [],
        "unit-case": "lower",
        "unit-no-unknown": true,
        "value-keyword-case": "lower",
        "value-no-vendor-prefix": true,
        "value-list-comma-newline-after": "always-multi-line",
        "value-list-comma-newline-before": "never-multi-line",
        "value-list-comma-space-after": "always-single-line",
        "value-list-comma-space-before": "never",
        "value-list-max-empty-lines": 0,
        "custom-property-empty-line-before": "never",
        "custom-property-pattern": "",
        "shorthand-property-no-redundant-values": true,
        "property-blacklist": [],
        "property-case": "lower",
        "property-no-unknown": true,
        "property-no-vendor-prefix": true,
        "keyframe-declaration-no-important": true,
        "declaration-bang-space-after": "never",
        "declaration-bang-space-before": "always",
        "declaration-colon-newline-after": "always-multi-line",
        "declaration-colon-space-after": "always-single-line",
        "declaration-colon-space-before": "never",
        "declaration-empty-line-before": "never",
        "declaration-property-unit-blacklist": {},
        "declaration-property-unit-whitelist": {
            "line-height": []
        },
        "declaration-property-value-blacklist": {},
        "declaration-property-value-whitelist": {},
        "declaration-block-no-duplicate-properties": true,
        "declaration-block-no-shorthand-property-overrides": true,
        "declaration-block-semicolon-newline-after": "always",
        "declaration-block-semicolon-newline-before": "never-multi-line",
        "declaration-block-semicolon-space-after": "never-single-line",
        "declaration-block-semicolon-space-before": "never",
        "declaration-block-single-line-max-declarations": 0,
        "declaration-block-trailing-semicolon": "always",
        "block-closing-brace-empty-line-before": "never",
        "block-closing-brace-newline-after": "always",
        "block-closing-brace-newline-before": "always-multi-line",
        "block-closing-brace-space-before": "always-single-line",
        "block-no-empty": true,
        "block-opening-brace-newline-after": "always-multi-line",
        "block-opening-brace-space-after": "always-single-line",
        "block-opening-brace-space-before": "always",
        "selector-attribute-brackets-space-inside": "never",
        "selector-attribute-operator-blacklist": [],
        "selector-attribute-operator-space-after": "never",
        "selector-attribute-operator-space-before": "never",
        "selector-attribute-quotes": "always",
        "selector-class-pattern": "",
        "selector-combinator-space-after": "always",
        "selector-combinator-space-before": "always",
        "selector-descendant-combinator-no-non-space": true,
        "selector-id-pattern": "",
        "selector-max-empty-lines": 0,
        "selector-max-compound-selectors": 3,
        "selector-max-id": 0,
        "selector-nested-pattern": "",
        "selector-no-qualifying-type": true,
        "selector-no-vendor-prefix": true,
        "selector-pseudo-class-blacklist": [],
        "selector-pseudo-class-case": "lower",
        "selector-pseudo-class-no-unknown": true,
        "selector-pseudo-class-parentheses-space-inside": "always",
        "selector-pseudo-element-case": "lower",
        "selector-pseudo-element-colon-notation": "double",
        "selector-pseudo-element-no-unknown": true,
        "selector-type-case": "lower",
        "selector-type-no-unknown": true,
        "selector-list-comma-newline-after": "always-multi-line",
        "selector-list-comma-newline-before": "never-multi-line",
        "selector-list-comma-space-after": "never-single-line",
        "selector-list-comma-space-before": "never",
        "rule-empty-line-before": [
        "always",
        {
            "ignore": [
            "after-comment",
            "inside-block"
            ]
        }
        ],
        "media-feature-colon-space-after": "always",
        "media-feature-colon-space-before": "never",
        "media-feature-name-case": "lower",
        "media-feature-name-no-unknown": true,
        "media-feature-name-no-vendor-prefix": true,
        "media-feature-parentheses-space-inside": "always",
        "media-feature-range-operator-space-after": "always",
        "media-feature-range-operator-space-before": "always",
        "custom-media-pattern": "",
        "media-query-list-comma-newline-after": "always-multi-line",
        "media-query-list-comma-newline-before": "never-multi-line",
        "media-query-list-comma-space-after": "always-single-line",
        "media-query-list-comma-space-before": "never",
        "at-rule-empty-line-before": [
        "always",
        {
            "ignore": [
            "after-comment",
            "inside-block"
            ],
            "ignoreAtRules": [
              "else",
              "media"
            ]
        }
        ],
        "at-rule-blacklist": [ "debug" ],
        "at-rule-name-case": "lower",
        "at-rule-name-newline-after": "always-multi-line",
        "at-rule-name-space-after": "always",
        "at-rule-no-unknown": [
        true,
        {
            "ignoreAtRules": [
            "extend",
            "at-root",
            "debug",
            "warn",
            "error",
            "if",
            "else",
            "for",
            "each",
            "while",
            "mixin",
            "include",
            "content",
            "return",
            "function"
            ]
        }
        ],
        "at-rule-no-vendor-prefix": true,
        "at-rule-semicolon-newline-after": "always",
        "comment-empty-line-before": [
        "always",
        {
            "except": ["first-nested"],
            "ignore": ["stylelint-commands"]
        }
        ],
        "comment-no-empty": true,
        "comment-whitespace-inside": "always",
        "comment-word-blacklist": [],
        "indentation": "tab",
        "max-empty-lines": 1,
        "max-line-length": [
        80,
        {
          "severity": "warning"
        }
        ],
        "max-nesting-depth": 2,
        "no-descending-specificity": true,
        "no-duplicate-selectors": true,
        "no-empty-source": true,
        "no-eol-whitespace": [
          true,
          {
            ignore: ["empty-lines"]
          }
        ],
        "no-extra-semicolons": true,
        "no-missing-end-of-source-newline": true,
        "no-unknown-animations": true,
        "plugin/no-unsupported-browser-features": [
          true,
          {
            "severity": "warning",
            "browsers": [
              "> 5%",
              "last 2 versions",
              "not ie 10"
            ]
          }
        ]
    }
}
